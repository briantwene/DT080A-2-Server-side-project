<?php
session_start();


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
else{
    print("Connected to Database Successfully");
    echo '<br>';
}

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES['imageUpload']['name']);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$description = checkUserData($_POST['description']); 
$title = checkUserData($_POST['title']);

//check if the image is a real or fake one

if(isset($_POST['submit'])){
    $check = getimagesize($_FILES['imageUpload']['tmp_name']);
    if($check !== false){
        $uploadOk = 1;
    }
    else{
        $uploadOk = 0;
    }
}

if(file_exists($target_file)){
    echo "file already exists";
    echo "<br>";
    $uploadOk = 0;
}

if($_FILES['imageUpload']['size'] > 10000000){
    echo 'file is too large';
    echo "<br>";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  echo "only JPG, JPEG, PNG & GIF files are allowed.";
  echo "<br>";
  $uploadOk = 0;
} 

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  echo "<br>";
  header('Refresh: 5; URL=galleryupload.php');
// if everything is ok, try to upload file
} 

else {
    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
        echo "The file has been uploaded.";
        $SQL = "INSERT INTO galleryimage (title,description,path,uid) VALUES ('$title','$description','$target_file',$uid)";
        mysqli_query($conn, $SQL);
        mysqli_close($conn);
        header('Refresh: 5; URL=yourphotos.php');
    } 
    else {
        echo "Sorry, there was an error uploading your file.";
        echo "<br>";
    }
}

function checkUserData($data){
    //runs 3 built in functions

    //for removing html and js symbols
    $data = htmlspecialchars($data);
    //remove whitespaces from the start and end of a string
    $data = trim($data);
    //removes slashes from the string
    $data = stripslashes($data);
    return $data;
}

?>