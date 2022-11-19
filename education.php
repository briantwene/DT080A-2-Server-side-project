<!--
    filename: education.php
    Name: Brian Twene
    Date: 5/04/21
-->
<?php include('PHP_include/antiSessionHijack.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--meta description tag for SEO-->
    <meta name="description" content="Information on the education that I have gone through">
    <meta charset="UTF-8">

    <!--meta viewport for website responsiveness-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--link to extenal stylesheet-->
    <link rel="stylesheet" href="CSS/cv.css?v=1.1">

    <title>BT ● My Education</title>

    <!--CSS for the article layout and elements-->
    <style>

        /*setting for the edu div*/
        .edu > ul{
            padding: 1em;
        }

        .edu{
            
            padding: 1em;
        }

        /*colors for the background and navigation bar*/
        html, body{
            background-color:  #3a2ab7ff;
        }

        nav{
            background-color: #161412ff;
        }

        nav > a, a:link, a:hover, a:visited, a:active{
            color:floralwhite;
            text-decoration: none;
        }


        
    </style>
</head>

<body>

    <!--Container for applying CSS grids-->
    <div class="gridbox">

        <!--Container for the header and navigation of the site-->
        <div class="top">
            
              <!--Container for the header and navigation of the site-->
            <div class="top-container">
                <!--page title inline css to change the color of the heading-->
                <header style="color:floralwhite;"><h1>BRIAN TWENE</h1></header>

                <!--navigation-->
                <nav>
                    <ul>
                        <!--links to other pages-->
                        <li class="link"><a href="index.php">Home</a></li>
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

        <!--Content area of the page-->
        <article>

            <!--Container for the education history-->
            <div class="edu">
                <p id="pagehead"><strong>Education history</strong></p>
                <br>
                    <!--heading with em tag for italics-->
                    <h4><em>Balbriggan Community College, Balbriggan (September 2015 - 2019)</em></h4>
                <br>
                <p>Leaving Certificate in the following</p>
            </div>
            <br>

            <div class="edu">
                    <!--heading with em tag for italics-->
                    <h4><em>Technological University Dublin - BA Ordinary (Level 7) in  Networking Technologies (September 2019 - Present)</em></h4>
                <br>
                <p>All modules passed</p>
                <br>
                <p>Modules:</p>
                <br>
                <!--unordered list showing all the modules-->
                <ul>
                    <li>Computer Hardware & Security</li>
                    <li>Network Fundamentals 1 (CCNA1)</li>
                    <li>Routing & Switching Essentials (CCNA2)</li>
                    <li>Web Development</li>
                    <li>Applied Data Networking</li>
                    <li>Electronics</li>
                    <li>Physical Computing 1 & 2</li>
                    <li>Business Managenent 1</li>
                    <li>Information Literacy and Report Writing</li>
                </ul>
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