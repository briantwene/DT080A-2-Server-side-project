<?php
//run code from these two includes
//one for checking user session variables
//and the other for checking if the user is logged in
include('../PHP_include/antiSessionHijack.php');
include('../PHP_include/userLoginCheck.php');

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

//get SQL query to send to the database and store in a variable
$sql = "SELECT * FROM galleryimage ORDER BY img_id ASC";
//send the query to the database and return the results
$result = mysqli_query($conn, $sql);
//get all the data from the results and store in images
//mysqli_fetch_all is similar to fetch_associate 
$images = mysqli_fetch_all($result);
mysqli_close($conn);

//store the array indexes of each colunmn into a variable 
$img_id = '0';
$title = '1';
$description = '2';
$path = '3';
$uploadtime = '4';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/gallerymain.css?v=1.1">
    <title>BT ● Gallery ● Home</title>
    
</head>
<body>
    <!--outer container of the page-->
    <div class="gridbox">
    <!--inner container for the naviagtion and header-->
    <div class="top">
    <!--header of the page-->
    <header>
        <h1>BT</h1>
    </header>

   <!--page navigation-->
   <nav>
            <ul>
                <li class='links'><a href="../index.php">Home</a></li>
                <li class='links'><a href="galleryhome.php">Gallery</a></li>
                <li class='links'><a href="galleryupload.php">Upload</a></li>
                <li class='links'><a href="yourphotos.php">My Uploads</a></li>
                <li class='links'><a href="../PHP_account/logout.php">Log Out</a></li>
            </ul>
    </nav>
    </div>
    <!--main content area for the pictures-->
    <article>
    <!--the title of the page and some text-->
    <h2>The Gallery</h2>
    <h4>Pictures contributed by the Community</h4>
    <!--code for displaying all the pictures that have their info stored on the database-->
    <!--I got this code from a tutorial on how to make an image gallery-->
    <!--link where I got the code from: https://codeshack.io/gallery-system-php-mysql-js/#filestructuresetup-->
    <!--author: David Adams-->
    <!--I modified it so that it would work for my site-->

    <ul>
        <!--run a php foreach loop that would go through the array of results from the database-->
        <?php foreach ($images as $image): ?>
            <!--if the picture exists in the path that was stored on the database-->
            <?php if (file_exists($image[$path])): ?>
            <!--the html code inside this if statment will be displayed with all the information from the database-->
            <li class="items">
                <!---->
                <a href="#<?=$image[$img_id]?>">
                <!--heres the php is used to put all the details of the image in a html image tag-->
                    <img src="<?=$image[$path]?>" data-id="<?=$image[$img_id]?>" data-title="<?=$image[$title]?>" loading="lazy">
                </a>
            </li>
            <!--end of if statment-->
            <?php endif; ?>
            <!--end of the for each loop-->
            <?php endforeach;?>
        <!--A fix for images getting disorted at the bottom-->
        <li id="last"></li>
    </ul>
    
    <div  class="lightbox-container">
        <?php foreach ($images as $image): ?>
            <?php if (file_exists($image[$path])): ?>
            <div class="lightboxes" id='<?=$image[$img_id]?>'>
                <div id=""class="lightbox-content">
                    <a href="#!" class='close'></a>
                    <img src="<?=$image[$path]?>" alt="<?=$image[$description]?>" data-id="<?=$image[$img_id]?>" data-title="<?=$image[$title]?>" loading="lazy">  
                </div>
                <div class='info'><h3 class='lightbox-title'><?=$image[$title]?></h3>
                    <p class="lightbox-description"><?=$image[$description]?></p>
                    <br>
                    <br>
                    <a href="download.php?file=<?=urlencode(str_replace("images/", "", $image[$path]))?>">Download</a>
                    

                </div>
                
               
                
            </div>
            <?php endif; ?>
            <?php endforeach;?>
        </div>
    </article>
    <footer>
    <?php
        echo "<p>" . date("Y") . " Brian Twene</p>";
    ?>
    </footer>
   

    </div>
</body>
</html>