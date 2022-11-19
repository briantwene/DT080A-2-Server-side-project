
<!--
    filename: antiSessionHijack.php
    Name: Brian Twene
    Date: 5/04/21

-->
<?php
//session start so that session variables can be used and accessed
session_start();

if(isset($_SESSION['ip']) && isset($_SESSION['useragent']) && isset($_SESSION['access'])){
        //if the user address doesnt match the one where the user logged in
        if($_SERVER['REMOTE_ADDR'] != $_SESSION['ip']){

            //destroy all sessions
            session_unset();
            session_destroy();
        }

        //if the user agent isnt the same 
        if($_SERVER['HTTP_USER_AGENT'] !=  $_SESSION['useragent']){
            session_unset();
            session_destroy();
        }

        //if the session has be on for longer than 2 hours
        if (time() > ($_SESSION['access'] + 7200)){
            //destroy all sessions
            session_unset();
            session_destroy();
        }
        //otherwise continue
        else{
            $_SESSION['access'] = time();
        }
}
?>