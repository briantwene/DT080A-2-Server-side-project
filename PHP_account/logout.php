<!--
    filename: logout.php
    Name: Brian Twene
    Date: 3/04/21

-->
<?php
//session start for the following functions to work
session_start();
//stop the sessions
session_unset();
//then delete them
session_destroy();
//expire the cookie if there is one that is created
setcookie('user','', time()-(86400*14),"/");
//redirect user back to the home page
header('Location: ../index.php');
?>

