<!--
    filename: login.php
    Name: Brian Twene
    Date: 3/04/21

-->
<?php
//session start to start a session on the page
session_start(); 
//if a cookie or session variable is set
if (isset($_COOKIE['user'])||(isset($_SESSION['login']) && $_SESSION['login'] == "1")){
        // user to the error page
        header('Location: loginErr.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/login.css">
    <title>BT ● Log In</title>
    <script>
        //function definition
        function formValid(){

                //define variables
                var x,y;

                //assign what the user inputs to the variables
                x = document.getElementById("uname").value;
                y = document.getElementById("pass").value;

                //if the username is empty
                if(x == "" || x == null){
                    //alert user 
                    alert("please put in a username") 
                    return false;  
                            
                }
                //if the password is empty
                if(y == ""|| y == null){
                    //alert the user
                    alert("please enter in a password")
                    return false;
                }

                
            }
    </script>
</head>

<body>
    <!--container for the whole page-->
    <div class="gridbox">
        <!--smaller container for the header of the page-->
        <div class="top"><a href="../index.php"><h1>BT</h1></a></div>
        <!--div for the form-->
        <div class="form">
            <!--title for the form-->
            <h2>Log In</h2>
            <!--login form-->
            <!--sends the data to an external script and runs js on it as well-->
            <form action="../PHP_checks/checkLogin.php" method="post" onsubmit="return formValid()">
            <span class="error">
            <?PHP 
                //allow session variable to work
                
                    //if the session variable is set
                    if (isset($_SESSION['error'])) { 
                        //then display the message
                        print($_SESSION['error']);
                        //then unset the variable 
                        unset($_SESSION['error']); 
                    }
                    echo '<br>';
                    //the same process here for another variable
                    if (isset($_SESSION['invalid'])){
                        print($_SESSION['invalid']);
                        unset($_SESSION['invalid']);
                    }
                ?>   
            </span>
               
                <p>
                    <!--input for the username-->
                    Username<span class="error">  *</span><br>
                    <input type="text" name="uname" class="dataInput" id="uname" placeholder="example: John99">
                    <span class="error">
                        <?php

                            if (isset($_SESSION['name'])){
                                print($_SESSION['name']);
                                unset($_SESSION['name']);
                            }
                        ?>
                    </span>
                </p>
                <p>
                    <!--input for the password-->
                    Password<span class="error">  *</span><br>
                    <input type="password" name="pass" class="dataInput" id="pass">
                    <span class="error">
                        <?php

                            if (isset($_SESSION['pass'])){
                                print($_SESSION['pass']);
                                unset($_SESSION['pass']);
                            }
                        ?>
                    </span>
                </p>
                <br>
                    <!--submit button-->
                    <input type="submit" name="submit" value="login" id="submit">
                
                <p>
                <p>
                    <!--remember me button-->
                    <!--if checked it will create a cookie for the user-->
                Remember me  <input type="checkbox" name="remember" id="remember">
                </p>
                <p>
                    <!--link to the registration page-->
                    Dont have an account? <a href="signup.php" style="color: #09c80e;">Register</a>
                </p>    
            </form>
        </div>
        <!--footer-->
        <div class="footer">
            Made by Brian Twene
                <!--homepage acting as a navigation page for SEO-->
                <a href="../index.php">Go Home</a>
        </div>
    </div>
</body>
</html>