<!--
    filename: passCheck.php
    Name: Brian Twene
    Date: 5/04/21

-->
<?php
//get the username of the current user logged in
$uname = $_SESSION['username'];
               
//run the rest of the php code when the user has submitted by POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //get the users input from the post variables
    $opass = $_POST['opass'];
    $npass = $_POST['npass'];
    $cpass = $_POST['cpass'];

    //declare and initalise the row variable
    $row = "";

    //check input for the old password
    //if the password is empty
    if (empty($opass)){
        //return required field error
        $opassError = "Field Required";
    }//or if the password is less than 8 characters
    elseif(sanityCheck($opass, 8)){
        //return error on password being too short
        $opassError = "Too short, Min 8 characters";
    }//or if the old password is the same as the new one 
    elseif($opass==$npass){
        //return an error
        $opassError = 'New password cant be same as Old one';
    }//otherwise run the data through the check function
    else{
        $opass = checkUserData($opass);
    }

    //check the input for the new password
    //if the password is empty
    if(empty($npass)){
        //return required field required
        $npassError = "Field Required";
    }//or if the password is less than 8 characters
    elseif(sanityCheck($npass, 8)){
        //return error on password being too short
        $npassError = "Too short, Min 8 characters";
    }
    else{//otherwise run the data through the check function
        $npass = checkUserData($npass);
    }

    //check the input for the confirm password
    //if the password is empty
    if (empty($cpass)){
        //return required field required
        $cpassError = "Field Required";
        
    }//or if the confirm password isnt the same as the password entered prior
    elseif($cpass !== $npass){
        //return error for this
        $cpassError = "Must same as new password to confirm";
    }
    else{//otherwise run the data through the check function
        $cpass = checkUserData($cpass);
    }

    //assign the connection to a variable
    $conn = mysqli_connect($db_serverIPAddr, $db_serverUname, $db_serverPwd, $database); 
    //check if the connection is successful
    if (mysqli_connect_errno())
            {
        print("Error connecting to MySQL database" . mysqli_connect_error());
    } 
   

   //create variable to store the database query
   $SQL_Query = "SELECT * FROM userdetails WHERE Uname = '$uname'";
   //send the query to data base and store the results
   $result = mysqli_query($conn, $SQL_Query);
   //store the number of matches in another variable
   $num_rows = mysqli_num_rows($result);    

    //if there is a match or the result is greater than 0
    if ($num_rows > 0){
        //get the information of the row and store it in an array
        $row = mysqli_fetch_assoc($result);
        //do a check on to see if the old password matches that in the database
        //password_verify() used since the old password is hashed on the db
        if(password_verify($opass,$row['Password'])){
            //if they match..
            //the new password is hashed and stored in a variable
            $hash = password_hash($npass,PASSWORD_DEFAULT);
            //then an sql update query is made that changes this field where the username is that of the current user
            $SQL = "UPDATE userdetails SET Password ='$hash' WHERE Uname = '$uname'";
            //send the query to the db
            mysqli_query($conn, $SQL);
            //close the connection
            mysqli_close($conn);
            //display a message saying successful
            $changed = 'password changed successfully';
        }
        else{//otherwise display error if password doesnt match
            $oldpasserr= 'old password does not match';
        }
    }
    else{//display this, maybe something wrong with sql query
        echo 'Error, Please try again later';
        echo $result;
    }
}

//user defined function
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
//user defined function
//checks if a string is shorter than the stated requirment
function sanityCheck($data, $length){
    // assign the type
    //if the string is shorter than the specified lenght
    if(strlen($data) < $length)
      {
        //return true statment 
        return TRUE;
      }
    else
      {
      //or else return false
        return FALSE;
      }
  }
?>