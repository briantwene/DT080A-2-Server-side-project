<!--
    filename: index.php
    Name: Brian Twene
    Date: 3/04/21
-->
<?php include('PHP_include/antiSessionHijack.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--meta description tag for SEO-->
    <meta name="description" content="Welcome to my Site, use the navigation get around">

    <meta charset="UTF-8">
    <!--meta viewport tag for website responsiveness-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link to external style sheet-->
    <link rel="stylesheet" href="CSS/cv.css?v=1.1">
    <title>BT ● Home</title>

    <!--CSS layout for the page-->
    <style>

        
       
        .top{
            grid-column: 1/7;
            grid-row:1/2;
        }

    
        footer{
            padding: 1em;
            grid-column: 1/7;
            grid-row: 3/4;
            background-color: transparent;
        
        }
        /*CSS grid layout settings for the whole page*/
        /*1 column 3 rows*/
        .gridbox{
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: min-content auto min-content;
            background-image: url('img/fibre.jpg');
            background-size: cover;
            background-position: center center;
        
        }

        /*background image div settings*/
        #img-box{

            grid-column: 1/7;
            grid-row:2/3;
           
            
            
        }

        /*grid layout for inner div*/
        /*5 rows and 3 cols*/
        #titlebox{
            min-height: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            grid-template-rows: 0.5fr min-content 0.5fr;
           
        
        }

        /*settings for the title area*/
        #title{
            grid-column: 1/6;
            grid-row:2/3;
            background-color:hsla(30, 10%, 8%, 0.5);
            padding: 1em;
            animation-name: example;
            
        }

        /*settings for the headers*/
        h1,h3,h5{
            color: white;
            text-align: center;
            align-content: center;
            padding: 1em;
        
        
        }

        


       
            
    </style>
</head>
<body>
    <!--hompage and navigation page for SEO-->
    
    <div class="gridbox">

        <!--Container for the header and navigation of the site-->
        <div class="top">
            <div class="top-container">

                 <!--navigation-->
                <nav>
                    <ul>
                        <!--links to other pages-->
                        <li class="link"><a href="#">Home</a></li>
                        <li class="link"><a href="education.php">My Education</a></li>
                        <li class="link"><a href="work.php">Work Experience</a></li>
                        <li class="link"><a href="cert.php">Certifications</a></li>
                        <li class='link'><a href='../contact.php'>Contact</a></li>
                        <li class='link'><a href='phpgallery/galleryhome.php'>Gallery</a></li>
                        <!--use php include to link to an external php file -->
                        <?php include('PHP_include/loginLink.php');?>
                        
                    </ul>
                </nav>

            </div>
        </div>

        <!--Div for the background image-->
        <div id="img-box">

            <!--div for creating an inner grid-->
            <div id="titlebox">
                
                <!--Div for the title-->
                <div id="title">
                    <h1>Brian Twene</h1>
                    <h3>Welcome to my site</h3>
                    <h5>Use the navigation bar above to get around the site</h5>
                </div>

            </div>
        </div>
        <!--Footer of the page-->
        <footer>
            Made by Brian Twene
        </footer>
    </div>
</body>
</html>