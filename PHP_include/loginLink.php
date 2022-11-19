<!--
    filename: loginlink.php
    Name: Brian Twene
    Date: 3/04/21

-->
<?php
    
    //if a user login cookie or session is set
    if (isset($_COOKIE['user'])||(isset($_SESSION['login']) && $_SESSION['login'] == "1")){
        //then display the following links on the nav
        echo "<li class='link'><a href='PHP_account/account.php'>$_SESSION[username]</a></li>";
        echo "<li class='link'><a href='PHP_account/logout.php'>Log out</a></li>";   
    }
    //or esle display this on the navigation 
    else{
    
        echo "<li class='link'><a href='../PHP_account/login.php'>Login/Sign Up</a></li>";
    } 
?>