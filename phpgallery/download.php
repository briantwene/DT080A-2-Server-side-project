<!--
filename: download.php
name: Brian Twene
Date: 15/6/21
-->

<!--
    ------Description----
This is a PHP script that will download the selected image for the user
-->
<?php
if(isset($_REQUEST["file"])){

    $image = urldecode($_REQUEST["file"]);

    if(preg_match('/^[^.][-a-z0-9_.]+[a-z]$/i', $image)){
        $filepath = "images/".$image;

        if(file_exists($filepath)){
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            ob_clean();
            flush(); // Flush system output buffer
            readfile($filepath);
            die();
        } else {
            http_response_code(404);
	        die();
        }
    }
    else {
        die("Invalid file name!");
    }
}

?>