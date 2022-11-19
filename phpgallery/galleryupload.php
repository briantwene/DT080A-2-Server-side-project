<?php
include('../PHP_include/antiSessionHijack.php');
include('../PHP_include/userLoginCheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/galleryupload.css?v=1.1">
    <title>BT ● Gallery ● Upload Image</title>
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
                <li class='links'><a href="../home.php">Home</a></li>
                <li class='links'><a href="galleryhome.php">Gallery</a></li>
                <li class='links'><a href="galleryupload.php">Upload</a></li>
                <li class='links'><a href="yourphotos.php">My Pictures</a></li>
                <li class='links'><a href="../PHP_account/logout.php">Log Out</a></li>
            </ul>
        </nav>
    </div>
    <article>
        
        <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="input"><h2>Upload Image</h2></div>            
        
        <div class="input">
            Select image to upload(Max. 10MB):
            <input type="file" name="imageUpload" id="imageUpload">
            <br>
        </div>
        <div class="input">
            Title<br>
            <input type="text" name="title" id='title'>
            <br>
        </div>
        <div class="input">
            Description<br>
            <textarea name="description" cols="30" rows="10"></textarea>
            <br>
        </div>
        <div id='submit'><input type="submit" value="Upload Image" name="submit" id="button"></div>
        
        </form>
    </article>
    <footer>
    <?php
        echo "<p>" . date("Y") . " Brian Twene</p>";
    ?>

    </footer>
</div>

    
</body>
</html>