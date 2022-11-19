<!--
    filename: work.php
    Name: Brian Twene
    Date: 3/04/21
-->
<?php include('PHP_include/antiSessionHijack.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--meta description tag for SEO-->
    <meta name="description" content="My work experience">

    <meta charset="UTF-8">
    <!--meta viewport tag for website responsiveness-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link to external stylesheet-->
    <link rel="stylesheet" href="CSS/cv.css?v=1.1">
    <title> BT ● Work Experience </title>

    <!--CSS for the article layout and elememts-->
    <style>


        /*Job div setting */
        #job{
            padding: 1em;
        }

        /*list settings*/
        #job > ul{
            padding: 1em;
        }

        #job > ul > li{
            padding-bottom: 1em;
        }
        
        /*image setting*/
        #job > img{
            width:100%
        }

        /*aritcle paragraph font size*/
        article > p{
        font-size: 21px;
    }
    </style>
</head>
<body>
    <!--Container for applying CSS grids-->
    <div class="gridbox">

        <!--Container for the header and navigation of the site-->
        <div class="top">
            <div class="top-container">

                <!--Page title-->
                <header><h1>BRIAN TWENE</h1></header>

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
            <p id="pagehead"><strong>My Work Experience</strong></p>

            <!--job info-->
            <div id="job">
                <!--heading element for the job title and position-->
                <h2>Sales Assistant</h2>
                <!--br tags for breaking lines and making spaces-->
                <br>
                <h2>Company: SuperValu</h2>
                <br>
                <p>2019-2020</p>
                <br>
                <p>I worked in SuperValu for roughly a year. Daily tasks included:</p>
                <br>
                <ul>
                    <!--job description using an unordered list-->
                    <li>Making sure that the work area is organised and clean.</li>
                    <li>Keeping inventory in check and handling deliveries</li>
                    <li>Providing customer support, by answering any queries, problems and escalating them if necessary</li>
                </ul>

                <!--Job picture with loading attribute for SEO optimisation-->
                <img src="img/supervalu.jpg" alt="SuperValu Logo" loading="lazy">
            </div>
            
            
            
        </article>

        <!--footer of the page-->
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