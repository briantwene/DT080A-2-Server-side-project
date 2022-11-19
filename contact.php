<!--
    filename: contact.php
    Name: Brian Twene
    Date: 5/04/21
-->
<?php include('PHP_include/antiSessionHijack.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--meta description tag for SEO-->
    <meta name="description" content="Here are my contact details and you can also leave a message for me here">
    <meta charset="UTF-8">

    <!--meta viewport tag for web resposniveness-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--link to external style sheet-->
    <link rel="stylesheet" href="CSS/cv.css?v=1.1">

    <title>BT ● Contact Me</title>

    <!--link to external javascript-->
    <script src="Javascript/formvalidation.js"></script>

    <style>
        /*grid layout for the article area of the page*/
        article{
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: auto;
        }

        /*settings for div containers in article area*/
        #cont-info{
            grid-column: 2/3;
            grid-row: 1/2;
            padding: 1em;
        }


        #message{
            grid-column: 1/2;
            grid-row: 1/2;
            text-align: center;
        }

        /*form design setting*/
        .form{
            border: none;
            border-bottom: 3px solid #3a2ab7ff;
            font-size: 18px;
            outline: none;
            width: 65%;
            padding: 1em;
            font-size: 20px;
            background-color: transparent;
        }

        /*when the user clicks or is filling out a part of 
        the form the area will be highlighted*/
        .form:focus{
            border-bottom: 5px solid #161412ff;
        }

        /*button design*/
        #button{
            padding: 1em;
            border: none;
            background-color: #3a2ab7ff;
            padding: 1em;
            margin-top: 1em;
            font-size: 20px;
            color:floralwhite;
            border-radius:1em;
            outline: none;
        }
        
        /*settings for smaller screens*/
        @media only screen and (max-width: 768px){

            #cont-info{
                grid-column: 1/2;
                grid-row:1/2;
            }

            #message{
                grid-column:1/2;
                grid-row:2/3;
            }

            /*grid layout for the article area*/
            article{
                grid-template-columns: 1fr;
                grid-template-areas:
                'contact'
                'message';

                text-align: center;
            }

            
        }
    </style>
</head>
<body>
     <!--Container for applying CSS grids-->
    <div class="gridbox">

        <!--Container for the header and navigation of the site-->
        <div class="top">

            <!--inner container for the header and footer-->
            <div class="top-container">

                <!--page title-->
                <header><h1>BRIAN TWENE</h1></header>

                <!--navigation bar-->
                <nav>
                    <ul>
                        <li class="link"><a href="index.php">Home</a></li>
                        <li class="link"><a href="education.php">My Education</a></li>
                        <li class="link"><a href="work.php">Work Experience</a></li>
                        <li class="link"><a href="cert.php">Certifications</a></li>
                        <li class='link'><a href='../contact.php'>Contact</a></li>
                        <li class='link'><a href='phpgallery/galleryhome.php'>Gallery</a></li>
                        <li class="link"><a href="contact.php">Contact</a></li>
                        <li class="link"><a href="login.php">Login/Sign Up</a></li>
                        
                    </ul>
                </nav>
            </div>

        </div>

        <!--Content area of the page-->
        <article>

            <!--Container for the contact info-->
            <div id="cont-info">
                <h3>Contact me</h3>
                <!--set the destination of the link to an email address-->
                <p>Email: <a href="mailto:twene521@gmail.com" style="color:black;">twene521@gmail.com</a></p>
            </div>

            <!--Container for the message form-->
            <div id="message">
                <h3>Leave a Message</h3>
                
                <!--Code for the message form-->
                <!--run the function in the external script when user submits information-->
                <form name="form" onsubmit="return formvalid()">
                    <br>
                    <!--input box for the first name-->
                    <input type="text" name="firstname" id="fname" class="form" placeholder="First Name">
                    <br>
                    <br>
                    <!--input box for the last name-->
                    <input type="text" name="lastname" id="lname" class="form" placeholder="Last Name">
                    <br>
                    <br>
                    <!--input box for the message-->
                    <textarea name="message" id="textbox" class="form" cols="30" rows="10" placeholder="Type your message here"></textarea>
                    <br>
                    <!--submit button-->
                    <input type="submit" id="button" value="Submit">
                </form>
        
            </div>
            
            
            
            
        </article>
        <!--Footer of the page-->
        <footer>
            Made by Brian Twene
            <br>
            <br>
            <!--homepage acting as a navigation page for SEO-->
            <a href="index.php">Click here if you are lost</a>
        </footer>

    </div>
</body>
</html>