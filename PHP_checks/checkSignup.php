<!--
    filename: checkSignup.php
    Name: Brian Twene
    Date: 4/04/21

-->
<?php
//start a session
session_start();
//set the timezone to GMT
date_default_timezone_set("Europe/Dublin");

//define intialise and assign variables
$cookieName = 'user';
$errorNum = 0;
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$email = $_POST['email'];
$pass = $_POST['pass'];

//session variables made for keeping in user input
$_SESSION['fname'] = $fname;
$_SESSION['lname'] = $lname;
$_SESSION['uname'] = $uname;
$_SESSION['email'] = $email;

//filter the email entered of illegal characters
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

//----form validation----//

//----fname validation----//

//if the user name is empty
if (empty($fname)){
    //display error message
    $_SESSION['fnameError'] = 'Field Required';
    //count the error
    $errorNum = $errorNum + 1;
}//or if the first has anything outside of the A-Z range
elseif(!preg_match("/^[a-zA-Z-' ]*$/",$fname)){
    //display error message
    $_SESSION['fnameError'] =  'Only "A-Z", "a-z", "-" allowed';
    //count the error
    $errorNum = $errorNum + 1;
}
else{
    $fname = checkUserData($fname);
}
//----lastname validation----//

if (empty($lname)){
    //display error message
    $_SESSION['lnameError'] = 'Field Required';
    //count the error
    $errorNum = $errorNum + 1;
}//or if the last has anything outside of the A-Z range
elseif(!preg_match("/^[a-zA-Z-' ]*$/",$lname)){
    //display error message
    $_SESSION['lnameError'] =  'Only "A-Z", "a-z", "-" allowed';
    //count the error
    $errorNum = $errorNum + 1;
}//otherwise run the data through a check function
else{
    $lname = checkUserData($lname);
}

//----uname validation----//

if (empty($uname)){
    //display error message
    $_SESSION['unameError'] = 'Field Required';
    //count the error
    $errorNum = $errorNum + 1;
}//else if the password is less than 3 characters
elseif(sanityCheck($uname,3)){
    //display error message
    $_SESSION['unameError'] = 'username too short min 3 characters';
    //count the error
    $errorNum = $errorNum + 1;
}
else{//otherwise run the data through a check function
    $uname = checkUserData($uname);
}
//----email validation----//

if (empty($email)){
    //display error message
    $_SESSION['emailError'] = 'Field Required';
    //count the error
    $errorNum = $errorNum + 1;
}//or if email is not in the right format
elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
    //display error message
    $_SESSION['emailError'] = 'Invalid Email';
    //count the error
    $errorNum = $errorNum + 1;
}
else{//otherwise run the data through a check function
    $email = checkUserData($email);
}

//----password validation----//

if (empty($pass)){
    //display error message
    $_SESSION['passError'] = 'Field Required';
    //count the error
    $errorNum = $errorNum + 1;
}//else if the password is less than 8 characters
elseif(sanityCheck($pass,8)){
    //display error message
    $_SESSION['passError'] = 'Too short min 8 characters';
    //count the error
    $errorNum = $errorNum + 1;
}
else{//otherwise run the data through a check function
    $pass = checkUserData($pass);
}

//--------------------SQL DATABASE CODE------------------//

//create variables for connection to the database
$db_serverIPAddr = "sql112.epizy.com";        //IP address of the database 
$db_serverUname = "epiz_28968750";              //default username used to set up MySQL db server    
$db_serverPwd = "MBfU33Leiro8";                    //default password used to set up MySQL db server
$database = "epiz_28968750_SSD";       //name of db to connect to
$port = "3306";


//connect to the database
$conn = mysqli_connect($db_serverIPAddr, $db_serverUname, $db_serverPwd, $database, $port); 
//check if the connection is successful
if (mysqli_connect_errno())
        {
    print("Error connecting to MySQL database" . mysqli_connect_error());
} //display message saying that the connection is successful
else {
    print("Connected to Brian’s MySQL database");
}

//store the sql query in a variable-check to see of the username or email entered appears in database
$SQL_Query = "SELECT * FROM userdetails WHERE Uname = '$uname' OR Email = '$email';";
//run the sql query over the connection and store the results in a variable
$result = mysqli_query($conn, $SQL_Query);
//get the associated values on the row found and store it in an array
$row = mysqli_fetch_assoc($result);

//template for SQL prepared statment
$sql = "INSERT INTO userdetails (Uname, Fname, Lname, Email, Password, ipAddress, date_time) VALUES(?,?,?,?,?,?,?)";

//when the template is sent to the database
if($prep = mysqli_prepare($conn,$sql)){
    //bind the variables to the SQL stament
    mysqli_stmt_bind_param($prep, "sssssss", $uname, $fname, $lname,$email,$hash,$ip,$date_time);
}

//if username found matches the one from the form 
if($row['Username'] == $uname){
    //count it as an error
    $errorNum = $errorNum + 1;
}
//the same for the email
if($row['Email'] == $email){
    //count as error
    $errorNum = $errorNum + 1;
}

//if the counter = 0 or has no errors
if($errorNum == 0){

    //encrypt the users passowrd
    $hash = password_hash($pass,PASSWORD_DEFAULT);
    //log the time and ip address
    $date_time =  date("H:i:s") ." ". date("d/m/y");
    $ip = $_SERVER['REMOTE_ADDR']; 
    $_SESSION['login'] = "1";
    $_SESSION['username'] = $uname;

    //set session variables for session hijacking prevention
    $_SESSION['ip'] = $ip;
    $_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
    $_SESSION['access'] = time();

    //execute the prepared statment
    mysqli_stmt_execute($prep);
    $SQL_Query = "SELECT * FROM userdetails WHERE Uname = '$uname'";
    //send the query to data base and store the results
    $result = mysqli_query($conn, $SQL_Query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $row['uid'];
    mysqli_stmt_close($prep);
    //close the sql connection
    mysqli_close($conn);
    //direct user to their account page
    header('Location: ../PHP_account/account.php');
}
//else since there are errors
else{
    //create session variables to display an error
    $_SESSION['error'] = 'login unsuccessful';
    $_SESSION['signError'] = 'Email/username already used';
    //close the connection to db
    mysqli_close($conn);
    //direct user back to the register page
    header('Location:  ../PHP_account/signup.php');
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

//user defined function
//checks if a string is shorter than the stated requirment
function sanityCheck($data, $length){
    // assign the type
    //if the string is shorter than the specified lenght
    if(strlen($data) < $length)
      {
        //return true statment 
        return TRUE;
      }
    else
      {
      //or else return false
        return FALSE;
      }
  }
?>