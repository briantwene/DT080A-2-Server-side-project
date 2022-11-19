<!--
    filename: CheckLogin.php
    Name: Brian Twene
    Date: 3/04/21

-->
<?php
    //session start so that session variables can be used
    session_start();
    //set time zone for time() to GMT
    date_default_timezone_set("Europe/Dublin");

    //store what us posted from the form into the variables
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];
    //create variable for cookie name
    $cookieName = "user";

    if (empty($uname) || empty($pass)){
        $_SESSION['invalid'] = "Fields Reqired";
        header('Location: ../PHP_account/login.php');
        exit();
    }

    //clean the uname variable from illegal characters
    $uname = filter_var($uname, FILTER_SANITIZE_STRING);
    //clean the user input further with the function
    $uname = checkUserData($uname);
    $pass = checkUserData($pass);

    //get the ip address of the user
    $ip = $_SERVER['REMOTE_ADDR'];
    //get the current time and date that the user is loggng in 
    $date_time =  date("H:i:s") ." ". date("d/m/y");

    

    $value = $uname;

//create variables for connection to the database
$db_serverIPAddr = "sql112.epizy.com";        //IP address of the database 
$db_serverUname = "epiz_28968750";              //default username used to set up MySQL db server    
$db_serverPwd = "MBfU33Leiro8";                    //default password used to set up MySQL db server
$database = "epiz_28968750_SSD";       //name of db to connect to
$port = "3306";


//connect to the database
$conn = mysqli_connect($db_serverIPAddr, $db_serverUname, $db_serverPwd, $database, $port); 

    //if there is an error 
    if (mysqli_connect_errno())
            {
        //display the error message
        print("Error connecting to MySQL database: " . mysqli_connect_error());
    } 
    //esle print a message saying that its all good
    else {
        print("Connected to Brians’s MySQL database");
    }

    //escape the strings to remove the SQL code that would be used for injection
    $uname = mysqli_real_escape_string($conn,$uname);
    $pass = mysqli_real_escape_string($conn, $pass);

    //create variable to store the database query
    $SQL_Query = "SELECT * FROM userdetails WHERE Uname = '$uname'";
    //send the query to data base and store the results
    $result = mysqli_query($conn, $SQL_Query);
    //store the number of matches in another variable
    $num_rows = mysqli_num_rows($result);

  
    //if there is a match
    if ($num_rows > 0){
        //get the data of that match
        $row = mysqli_fetch_assoc($result);
        //if the password in the data base is the same as the input
        if(password_verify($pass, $row['Password'])){
            //log the user in
            //if the remember me box is checked 
            if(isset($_POST['remember'])){
                //update the table with the time and ip address of the user
                $SQL = "UPDATE userdetails SET ipAddress='$ip', date_time='$date_time' WHERE Username = '$uname'";
                //send the query
                mysqli_query($conn, $SQL);
                //creat a cookie for 14 days
                setcookie($cookieName, $value, time() + (86400*14),"/");
                //set two session variables for user identity
                $_SESSION['login'] = "1";
                $_SESSION['username'] = $uname;
                $_SESSION['id'] = $row['uid'];
                //set session variables for session hijacking prevention
                $_SESSION['ip'] = $ip;
                $_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
                $_SESSION['access'] = time();
                //close the db connection
                mysqli_close($conn);
                //redirect user to account page
                header('Location: ../PHP_account/account.php');
            }
            //if no remember me
            else{
                //update the table
                $SQL = "UPDATE userdetails SET ipAddress='$ip', date_time='$date_time' WHERE Username = '$uname'";
                mysqli_query($conn, $SQL);

                //create session variables only
                $_SESSION['login'] = "1";
                $_SESSION['username'] = $uname; 
                $_SESSION['id'] = $row['uid'];
                $_SESSION['ip'] = $ip;
                $_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
                $_SESSION['access'] = time();
                mysqli_close($conn);
                //redirect user
                header('Location: ../PHP_account/account.php');
            }
        }
        //if not a match with user input
        else{
             //display error message
        $_SESSION['error'] = 'login unsuccessful';
        $_SESSION['pass'] = 'Invalid Password';
        //redirect user to the login page
        header('Location: ../PHP_account/login.php');

        }
    }
    else{
        //if there is no match on the username then display error and send user back
        $_SESSION['error'] = 'login unsuccessful';
        $_SESSION['name'] = 'Invalid Username';
        header('Location: ../PHP_account/login.php');
    }
    
   //user defined function
function checkUserData($data){
    //runs 3 built in functions

    //for removing html and js symbols
    $data = htmlspecialchars($data);
    //remove whitespaces from the start and end of a string
    $data = trim($data);
    //removes slashes from the string
    $data = stripslashes($data);
    return $data;
}
?>