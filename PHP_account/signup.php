<!--
    filename: signup.php
    Name: Brian Twene
    Date: 4/04/21

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
    <title>BT ● Sign Up</title>
    <style>
    /*CSS settings to change the colors of some areas*/    
    html{
        /*change the background of the page to this gradient*/
        background: rgb(2,0,36);
    
        background: linear-gradient(240deg, rgba(2,0,36,1) 0%, rgba(255,1,208,1) 0%, rgba(0,212,255,1) 100%);
    }

    /*change the color of the input fields */
    .dataInput:focus{
        color:#ff01d0;
        border-bottom: 3px solid #ff01d0;
    
    }
    /*color of the button*/
    #submit{
        background-color:#ff01d0;
    }


    </style>
    <script>
        /*Javascript for form validation*/

        /*function definition*/
        function formValid(){
                /*define variables*/
                var uname,pass,fname,lname,email;

                /*assign user input to the variables */
                fname = document.getElementById("fname").value;
                lname = document.getElementById("lname").value;
                email = document.getElementById("email").value;
                uname = document.getElementById("uname").value;
                pass = document.getElementById("pass").value;

                //check to see if any of the field are empty
                if(fname==""||lname==""||email==""||uname==""||pass==""){
                    alert("Please Fill in the Required fields");
                    return false;
                }

                /*check to see if the lenght of the user name and password is above the minimum */
                if(x.length < 3||y.length < 8){
                    /*alert the user if it is too short*/
                    alert("Username or password. Password: min 8 , Username: min 3") 
                    return false;  
                            
                }
        
            }
    </script>
</head>
<body>
    <!--container for the whole page-->
    <div class="gridbox">
    <!--smaller container for the header of the page-->
    <div class="top"><a href="..//index.php"><h1>BT</h1></a></div>
    <!--div for the form-->
        <div class="form">
             <!--title for the form-->
            <h2>Register</h2>
            <!--sends the data to an external script and runs js on it as well-->
            <form action="../PHP_checks/checkSignup.php" method="post" onsubmit="return formValid()">
                <span class="error">
                <?php
                //if the session variable is set
                    if (isset($_SESSION['error'])) { 
                        //then display the message
                        print($_SESSION['error']); 
                        //then unset the variable 
                        unset($_SESSION['error']); 
                    }
                    echo '<br>';
                    //the same process here for another variable
                    if (isset($_SESSION['signError'])) { 
                        print($_SESSION['signError']); 
                        unset($_SESSION['signError']); 
                    }
                ?>
                </span>
                
                <p>
                     <!--input for the first-->
                    First Name<span class="error"> *</span><br>
                    <input type="text" name="fname" class="dataInput" value=" <?php
                                //used for keeping the user input in the field
                                //for if they have to correct their detials
                                if (isset($_SESSION['fname'])) { 
                                    print($_SESSION['fname']); 
                                    unset($_SESSION['fname']); 
                                }
                            ?>">
                    <br>
                            <span class="error">
                             <!--script for displaying errors-->   
                            <?php
                                if (isset($_SESSION['fnameError'])) { 
                                    print($_SESSION['fnameError']); 
                                    unset($_SESSION['fnameError']); 
                                }
                            ?>
                    </span>
                </p>
                <p>
                     <!--input for the last name-->
                    Last Name<span class="error"> *</span><br>
                    <input type="text" name="lname" class="dataInput" value=" <?php
                                //used for keeping the user input in the field
                                //for if they have to correct their detials
                                if (isset($_SESSION['lname'])) { 
                                    print($_SESSION['lname']); 
                                    unset($_SESSION['lname']); 
                                }
                            ?>">
                    <br>
                    <span class="error">
                         <!--script for displaying errors-->
                        <?php
                        if (isset($_SESSION['lnameError'])) { 
                            print($_SESSION['lnameError']); 
                            unset($_SESSION['lnameError']); 
                        }
                        ?>
                    </span>
                </p>
                <p> <!--input for the email-->
                    E-mail<span class="error"> *</span><br>
                    <input type="text" name="email" class="dataInput" value=" <?php
                                if (isset($_SESSION['email'])) { 
                                    print($_SESSION['email']); 
                                    unset($_SESSION['email']); 
                                }
                            ?>">
                    <br>
                    <span class="error">
                         <!--script for displaying errors-->
                    <?php
                    if (isset($_SESSION['emailError'])) { 
                        print($_SESSION['emailError']); 
                        unset($_SESSION['emailError']); 
                    }
                    ?>  
                    </span>
                </p>
                <p>
                     <!--input for the username-->
                    Username <span class="error"> *</span><br>
                    <input type="text" name="uname" class="dataInput" id="uname" value=" <?php
                                //used for keeping the user input in the field
                                //for if they have to correct their detials
                                if (isset($_SESSION['uname'])) { 
                                    print($_SESSION['uname']); 
                                    unset($_SESSION['uname']); 
                                }
                            ?>">
                    <br>
                    <span class="error">
                         <!--script for displaying errors-->
                    <?php
                    if (isset($_SESSION['unameError'])) { 
                        print($_SESSION['unameError']); 
                        unset($_SESSION['unameError']); 
                    }

                
                    if (isset($_SESSION['unameSanity'])) { 
                        print($_SESSION['unameSanity']); 
                        unset($_SESSION['unameSanity']); 
                    }
                    ?>
                
                    </span>
                </p>
                <p>
                     <!--input for the password-->
                    Password<span class="error"> *</span><br>
                    <input type="password" name="pass" class="dataInput" id="pass">
                    <br>
                    <span class="error">
                         <!--script for displaying errors-->
                    <?php
                    if (isset($_SESSION['passError'])) { 
                        print($_SESSION['passError']); 
                        unset($_SESSION['passError']); 
                    }
                
                    if (isset($_SESSION['passSanity'])) { 
                        print($_SESSION['passSanity']); 
                        unset($_SESSION['passSanity']); 
                    }
                    ?>
                    
                    </span>
                </p>
                <br>
                    	 <!--submit button-->
                    <input type="submit" name="submit" value="Register" id="submit">
                
                <p>
                    Already a user? <a href="login.php" style="color: #ff01d0;">Log In</a>
                </p>    
            </form>
        </div>
        <div class="footer">
            Made by Brian Twene
                <!--homepage acting as a navigation page for SEO-->
                <a href="..//index.php">Go Home</a>
        </div>
    </div>
</body>
</html>