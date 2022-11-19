<!--
    filename: cert.php
    Name: Brian Twene
    Date: 3/04/21
-->
<?php include('PHP_include/antiSessionHijack.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--meta description tag for SEO-->
    <meta name="description" content="Here is the certifications I currently have and ones that im studying to get">
    <meta charset="UTF-8">
    <!--meta viewport tag for web resposniveness-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--link to external stylesheet-->
    <link rel="stylesheet" href="CSS/cv.css?v=1.1">

    <title>BT ● Certifications </title>

    <!--CSS for the Article layout and elements in it-->
    <style>
      
        
        /*Settings div containers in article*/
        #cert1{
            padding: 1em;

        }

        #cert2{
            padding:1em;
        }
        
        #certpic2{
            grid-area:certpic2;
        }
        
        /*image settings*/
        img{
            width: 100%;
            height:400px;
        }

        #certpic2 > img{
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        /*List settings in article*/
        #cert1 > ul > li, #cert2 > ul > li{
            padding-bottom: 1em;
        }

        .bulletlist{
            padding-left: 3em;
        }

        
        
        /*settings for bigger screens*/
        @media only screen and (min-width: 768px){

            .top{
                grid-column: 1/7;
                grid-row: 1/2;
             }

            article{
                grid-column: 1/7;
                grid-row: 2/3;
            }

            footer{
                grid-column: 1/7;
                grid-row: 3/4;
            }

            /*grid layout of the whole page, 
            made the article are span the whole page instead of it being in the middle */
            .gridbox{
            display: grid;
            grid-template-areas: 
            'top top top top top top'
            'article article article article article article'
            'footer footer footer footer footer footer';

            }

            #cert1{
            grid-column: 1/2;
            grid-row:1/2;
            padding: 1em;

            }

            #certpic1{
                grid-column: 2/3;
                grid-row:1/2;
                
            }

            #cert2{
                grid-column: 1/2;
                grid-row: 2/3;
                
                padding:1em;
            }
            
            #certpic2{
                grid-column: 2/3;
                grid-row:2/3;
                
            }
        /*grid layout of the article area*/
        #certbox{
            
            display:grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows:min-content min-content;
        
        }

        /*image settings*/
       #certpic2 > img{
           height: 300px;
           width: 300px;
       }
        
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
                <!--page title-->
                <header><h1>BRIAN TWENE</h1></header>

                <!--navigation-->
                <nav>
                    <!--Unordered list for the navigation links-->
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
            <div id="articlehead"><p id="pagehead"><strong>Certifications</strong></p></div>
            
            <div id="certbox">
                <!--Container for the first certification-->
                <div id="cert1">
                    <!--heading for the cert name-->
                    <h4>CompTIA A+</h4>
                    <p>I Currently have my CompTIA A+ Certification. This is an entry level IT cert and from it you learn how to</p>
                    <br>
                    <!--Unorderd list for key parts of the certification-->
                    <ul class="bulletlist">
                        <li>Basic troubleshooting on Operating systems and Computer hardware</li>
                        <li>Installing and configuring laptops and computers</li>
                        <li>The networking basics such as The TCP/iP model along with wireless networks and troubleshooting.</li>
                        <li>Securing Devices from malware, viruses and activity such as Social engineering.</li>
                    </ul>
                </div>
                <!--container for first picture-->
                <div id="certpic1"><img src="img/Comptialogo.svg" alt="CompTIA A+ logo" loading="lazy"></div>

                <!--Container for second certification-->
                <div id="cert2">
                    <!--heading for the cert name-->
                    <h4>Cisco CCNA</h4>
                    <!--paragraph tag on the description of the cert-->
                    <p>Another Certification that I am aiming for is the Cisco CCNA. It is the entry level networking course that Cisco offers.</p>
                    <br>
                    <p>The course covers these things:</p>
                    <br>

                    <!--Unorderd list for key parts of the certification-->
                    <ul class="bulletlist">
                        <li>TCP/IP Model</li>
                        <li>VLANS and Trunking</li>
                        <li>LAN/WAN/WLAN</li>
                        <li>Switching and routing concepts</li>
                        <li>IP addressing and Subnetting</li>
                    </ul>

                </div>
                <!--container for second picture-->
                <div id="certpic2">

                    <!--Image with loading attribute for SEO optimisation-->
                    <img src="img/CCNA.png" alt="CCNA Logo" loading="lazy">
                </div>
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