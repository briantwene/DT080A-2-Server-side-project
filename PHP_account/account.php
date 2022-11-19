<!--
    filename: account.php
    Name: Brian Twene
    Date: 5/04/21

-->
<?php
//use to allow session variables to work
include('../PHP_include/antiSessionHijack.php');
//using php include to run an external script
include('../PHP_include/userLoginCheck.php');

//declare variables username from the session variable available
$uname = $_SESSION['username'];

//declare and initalise other local variable
$lname = $fname = $username = $email = "";
$opassError = $npassError = $cpassError = $changed="";

//create variables for connection to the database
$db_serverIPAddr = "sql112.epizy.com";        //IP address of the database 
$db_serverUname = "epiz_28968750";              //default username used to set up MySQL db server    
$db_serverPwd = "MBfU33Leiro8";                    //default password used to set up MySQL db server
$database = "epiz_28968750_SSD";       //name of db to connect to
$port = "3306";


//connect to the database
$conn = mysqli_connect($db_serverIPAddr, $db_serverUname, $db_serverPwd, $database, $port); 

//if there is a connection error
if (mysqli_connect_errno())
        {
    // then print an error message and exit script
    print("Error connecting to MySQL database" . mysqli_connect_error());
} 

//create variable to store database query in 
$SQL_Query = "SELECT * FROM userdetails WHERE Uname = '$uname'";

//run this query and store the result in $result
$result = mysqli_query($conn, $SQL_Query);
//find the number of rows from the result and store them in $num_rows
$num_rows = mysqli_num_rows($result);

//if the result is greater than 0
if (mysqli_num_rows($result) > 0){
    //it means that the results have been found

    //fetch the data stored in that row and put it in an array called $row
    $row = mysqli_fetch_assoc($result);

    //assign the data in the array to the corresponding variable
    $fname = $row['Fname'];
    $lname = $row['Lname'];
    $username = $row['Uname'];
    $email = $row['Email']; 
    //then close the connection
    mysqli_close($conn);
}       //if nothing is found
else{
    //send a message
    echo 'cannot get data';
    //and close the connection to the database
    mysqli_close($conn);
}
?>
<!--html markup-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BT ● Account Dashboard</title>
    <!--Link to the stylesheet-->
    <link rel="stylesheet" href="../CSS/account.css?=v1.1">
    
</head>
<body>

<!--container for the whole page-->
    <div class="gridbox">
        <!--smaller container for the header and naviagtion of the page-->
    <div class="top">
        <!--header for the page-->
        <header>
        <a href="../index.php"><h1>BT</h1></a>
        </header>

        <!--page navigation-->
        <nav>
            <ul>
                <li class='links'><a href="../index.php">Home</a></li>
                <li class='links'><a href="../phpgallery/galleryhome.php">Gallery</a></li>
                <li class='links'><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
    </div>
        <!--content area of the page-->
        <article>
            <!--div for the user details that cant be changed-->
            <div class="info">
                <!--title for this area-->
                <div class="detailtitle"><h2>Dashboard</h2></div>
                <!--form for displaying the users details-->
                <form name="details" id="detail">

                    <div class="inputdivs"> Full Name<br>
                    <!--input form element that is in readonly mode-->
                    <!--php is being used to display the users full name-->
                    <input type="text" name='name' value="<?php echo $fname.' '.$lname;?>" class="datainput" readonly>
                    </div>
                    <div class="inputdivs">Username<br>
                    <!--input form element that is in readonly mode-->
                    <!--php is being used to display the users  username-->
                    <input type="text" name='uname' value="<?php echo $uname;?>"  class="datainput" readonly>
                    </div>
                    <div class="inputdivs"> E-mail<br>
                    <!--input form element that is in readonly mode-->
                    <!--php is being used to display the users email-->
                    <input type="text" name="email" value="<?php echo $email;?>" class="datainput" readonly>
                    </div>
                </form>
            </div>
            <!--the second area for changing the password-->
            <div class="passchange">
            <!--title for the area-->
            <div class="passtitle">
                <!--php include to run an external script that will change the user password-->
                <?php include('../PHP_include/passCheck.php');?>
                <h2>Change Password</h2><span class="success"><?php echo $changed;?></span>
            </div>
                <!--form for changing the password-->
                <!--when submit is pressed the data will be sent to the php in this file-->
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" name="password" id="formpass">
                    <div class="inputdivs"">
                        Old Password<br>
                        <!--input for the old password-->
                        <!--span element used to display any errors to the user-->
                        <input type="password" name="opass" class="datainput"><br>
                        <span class="error"><?php echo $opassError;?></span>
                    </div>

                    <div class="inputdivs">
                        New Password<br>
                         <!--input for the new password-->
                        <!--span element used to display any errors to the user-->
                        <input type="password" name="npass" class="datainput"><br>
                        <span class="error"><?php echo $npassError;?></span>
                    </div>
                    <div class="inputdivs">
                        Confirm Password<br>
                         <!--input for confirming the new password-->
                        <!--span element used to display any errors to the user-->
                        <input type="password" name="cpass" class="datainput"><br>
                        <span class="error"><?php echo $cpassError;?></span>
                    </div>
                    <!--submit button once pressed the php script will be run-->
                    <div class="inputdivs">
                    <p style="color: transparent;">submit</p>
                    <input type="submit" value="Change Password" id="button">
                    
                    </div>
                </form>
                
            </div>
            
        </article>
    

        <!--footer area-->
        <footer>
        Made by Brian Twene
            <br>
            <!--homepage acting as a navigation page for SEO-->
            <a href="../index.php">Click here if you are lost</a>
        </footer>
        

    </div>
    
 
    
</body>
</html>