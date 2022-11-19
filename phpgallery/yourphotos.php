<?php
include('../PHP_include/antiSessionHijack.php');
include('../PHP_include/userLoginCheck.php');
$uid = $_SESSION['id'];

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

$sql = "SELECT * FROM galleryimage WHERE uid = '$uid'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0){
    $_SESSION['nopic'] = 'you have no pictures uploaded';
    }
$images = mysqli_fetch_all($result);

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
    <link rel="stylesheet" href="../CSS/gallerymain.css">
    <title>BT ● Gallery ● My Uploads</title>
    <script>
        $(function () {
            $(document).scroll(function () {
                var $nav = $(".top");
                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            });
        });
    </script>
</head>
<body>
    <div class="gridbox">
    <div class="top">
    <header>
        <h1>BT</h1>
    </header>
   <!--page navigation-->
   <nav>
            <ul>
                <li class='links'><a href="../index.php">Home</a></li>
                <li class='links'><a href="galleryhome.php">Gallery</a></li>
                <li class='links'><a href="galleryupload.php">Upload</a></li>
                <li class='links'><a href="yourphotos.php">My Pictures</a></li>
                <li class='links'><a href="../PHP_account/logout.php">Log Out</a></li>
            </ul>
        </nav>
    </div>
    <article>
    <h2>My Uploads</h2>
    <h4>Pictures you uploaded appear here</h4>
    <?php
        if (isset($_SESSION['nopic'])) { 
            print($_SESSION['nopic']); 
            unset($_SESSION['nopic']); 
        }
    ?>
    <ul>
    <?php foreach ($images as $image): ?>
            <?php if (file_exists($image[$path])): ?>
            <li class="items">
                <a href="#<?=$image[$img_id]?>">
                    <img src="<?=$image[$path]?>" alt="<?=$image[$description]?>" data-id="<?=$image[$img_id]?>" data-title="<?=$image[$title]?>">
                </a>
            </li>
            <?php endif; ?>
            <?php endforeach;?>
        <li id="last"></li>
    </ul>
    <div  class="lightbox-container">
        <?php foreach ($images as $image): ?>
            <?php if (file_exists($image[$path])): ?>
            <div class="lightboxes" id='<?=$image[$img_id]?>'>
                <div id=""class="lightbox-content">
                    <a href="#" class='close'></a>
                    <img src="<?=$image[$path]?>" alt="<?=$image[$description]?>" data-id="<?=$image[$img_id]?>" data-title="<?=$image[$title]?>">  
                </div>
                <div class='info'><h3 class='lightbox-title'><?=$image[$title]?></h3>
                    <p class="lightbox-description"><?=$image[$description]?></p>
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