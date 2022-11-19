//Filename: formvalidation.js
//Name: Brian Twene
//Date: 22/02/2021
function formvalid(){

    //declare three variables
    var x, y, z;

    //store the data from the form into these variables
    x = document.getElementById("fname").value
    y = document.getElementById("lname").value
    z = document.getElementById("textbox").value

    //check if all the fields are filled in
    if (x == "" || y == "" || z == "") {

        //alert user if all of the fields not put in
        alert("All inputs are required");
    
    }
    
    //otherwise tell user that the message has been submitted
    else{
        alert("Submitted");
    
    }

}