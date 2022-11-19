<!--
    filename: userloginCheck.php
    Name: Brian Twene
    Date: 5/04/21

-->
<?php
//if a user login cookie or session is set
if (isset($_COOKIE['user'])||(isset($_SESSION['login']) && $_SESSION['login'] == "1")){
    //direct user to their account
    
}
else{
    //else send them to the login page and display the message there.
    $_SESSION['error'] = 'you must be logged in to view this page';
    header('Location: ../PHP_account/login.php');
}
?>