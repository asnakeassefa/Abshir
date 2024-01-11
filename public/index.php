<!DOCTYPE html>
<?php 
include 'validate.php';

if (isset($_GET['jwt'])) {
    $jwt = $_GET['jwt'];
    if (!val_jwt($jwt)){
        
        header("Location: login.php");

    }
    echo "<script>console.log('Debug Objects: " . $jwt . "');</script>";



}
else {
    echo "<script>console.log('Debug Objects: " . "jwt error" . "');</script>";
            header("Location: login.php");

}
?>
<html lang="en">
<head>
    <link href="../css/style.css" type="text/css" rel="stylesheet">
    <link href="../css/all.min.css" rel="stylesheet">
    <link href="../css/fontawesome.min.css" rel="stylesheet">
    
    <title>Abishir commerce center</title>
</head>
<body>
        <div class="content">
            <?php
                include "connection.php";
                include "navbar.php";
            ?>
        
        <div class="main">
        <div class="hero">
            <h1>Find something memorable</h1>

            <p>Abishir delala is one of the top ecommerce website in Ethiopia which do
                all brooker tasks to simplify sell and buy process easy for all Ethiopians
                if you are entrested serach and find what you like to buy.
            </p>
            <div class="search">
                <form action="search.php" method="post" id="sform">
                    <input id="search" name="search" type="text" placeholder="search">
                </form>
                    <i class="fas fa-search"" onclick="search()" style="cursor:pointer"></i>
            </div>

            <script>
                function search(){
                    document.getElementById("sform").submit();
                }
            </script>
        </div>
        </div>
    </div>

    <!--Stat-->
    <div class="stat">
        <div class="statcon">
            <h3 class="textalign">company history</h3>
        <div class="images textalign">
            <div class="image">
                <i class="fas fa-upload"></i>
                <h3>4830</h3>
                <p>deployment</p>
            </div>
            <div class="image">
                <i class="fas fa-project-diagram"></i>
                <h3>15,638</h3>
                <p>deals</p>
            </div>
            <div class="image">
                <i class="fas fa-server"></i>
                <h3>12,958 </h3>
                <p>published</p>
            </div>
           
        </div>
        </div>
    </div>

    <!--blackcon-->
    <div class="intro">
        <div class="cimages textalign">
            <div class="maincon">
                <div class="card">
                    <div class="front">
                        <h3>Employee</h3>
                        <img class="cimg" src="img/employee/employee1.jpg" alt="facebook">
                        <h3>Are you an employee? if you are don't miss this chanance
                            apply today.</h3>
                        
                    </div>
                    <div class="back">
                        <h3>ONLY</h3>
                        <h2>Deal now</h2>
                        <a href="item.html">See more</a>
                    </div>
                </div>
            </div>
            
            <div class="maincon">
                <div class="card">
                    <div class="front">
                        <h3>Office</h3>
                        <img class="cimg" src="img/office/office1.jpg" alt="facebook">
                        <h3>Best environment for work is make you productive? click and
                            get your best working environment.you can get best office in here.
                        </h3>
                        
                    </div>
                    <div class="back">
                        <h3>ONLY</h3>
                        <h2>$229.89</h2>
                        <a href="item.html">See more</a>
                    </div>
                </div>
            </div>

            
            <div class="maincon">
                <div class="card">
                    <div class="front">
                        <h3>House</h3>
                        <img class="cimg" src="img/house/house1.jpg" alt="facebook">
                        <h3>Homes for sell and rent are here you can order know think it</h3>
                        
                    </div>
                    <div class="back">
                        <h3>ONLY</h3>
                        <h2>$48,888</h2>
                        <a href="item.html">See more</a>
                    </div>
                </div>
            </div>


            <div class="maincon">
                <div class="card">
                    <div class="front">
                        <h3>Car</h3>
                        <img class="cimg" src="img/car/car1.png" alt="facebook">
                        <h3>Are you a car fun? we have best cars with the less price</h3>
                        
                    </div>
                    <div class="back">
                        <h3>ONLY</h3>
                        <h2>$65,223</h2>
                        <a href="item.html">See more</a>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!--Service we provide-->

        <div class="service">
            <div class="servicecont">
            <div class="con grid1">
                <img src="img/employee/employee1.jpg" alt="">
                <p class="p2"><strong>EMPLOYEE</strong><br><br>A motivated employee is likely to possess other qualities that make them the perfect employee. 
                    They will want to advance within the company so they will want to stand out. 
                    This means that are much more likely to communicate which is a key trait. 
                    They likely will be a good listener who will take direction and wants to learn. 
                    They are more likely to think about the consequences of their actions.
                    It's easy to find someone skilled, smart, talented and has a good resume, but a good 
                    attitude is gold. It's not easily found, and cannot be taught. For me, the perfect 
                    employee is someone who is really smart, but is also humble. They still follow rules, 
                    accept mistakes and respect others.
                </p>
            </div>

            <div class="con grid2">
                <img src="img/house/house1.jpg" alt="">
                <p class="p1"><strong>OFFICE</strong><br><br>House is basic need for human life we are interesed in find your best home for you
                    and your family. If you want best House and Apartment click on show more button
                    Then you will find a tone of houses avalable for you to choose. don't be shiy 
                    we are the trusted componey for 2 years you can see the sell stata in Home page.
                    There’s no such thing as a boring house! Every house is special!
                    But let’s be real. Writing a listing description for a 6000 sqft Hollywood mansion is pretty easy.But that isn’t 
                    a typical listing for your median agent, is it?
                    What about the 1500 sqft 1980 tract build with laminate kitchen counters and 
                    brass fixtures in a “meh” part of town? How do you get more than 3 sentences in there?
                </p>
                
            </div>

            <div class="con grid3">
                <img src="img/office/office1.jpg" alt="">
                <p class="p2"><strong>OFFICE</strong><br><br>Your people are what really make up your organisation. A successful organisation 
                    doesn’t happen without great people. An effective talent retention and attraction strategy 
                    will help you to hold onto your best team players and recruit new ones as your company 
                    grows and develops. A productive workspace will have been intelligently designed to help 
                    your people do their best work. Promote creativity, collaboration and focussed working with 
                    an intelligent office design.
                    The furniture in your office space is more important than you might think. The welfare of 
                    your employees is greatly impacted by your furniture offering. Choose office furniture that 
                    will keep your people comfortable and healthy. Choosing good quality furniture will ensure 
                    the longevity of your office space.
                </p>
            </div>

            <div class="con grid4">
                <img src="img/car/car6.png" alt="">
                <p class= "p1"><strong>CARS</strong><br><br>It seems every new vehicle we drive is both more powerful and more fuel-efficient
                    than its predecessor. More comfortable and more fun. More refined, but similarly priced. 
                    Choosing a good car is easier than ever, but choosing the best car keeps getting trickier.
                     That’s why several times a year we round up category standouts and staff favorites and bring
                      them together in lists that help make car shopping easier.
                      Not all cars are created equal, and we have the data to prove it. Of course, numbers can tell
                    a variety of tales and we understand every consumer has different priorities. To that end, 
                    we have compiled a series of best and worst car lists to highlight performance in a wide 
                    variety of categories.
                </p>
                
            </div>
        </div>
        </div>


        <!--Footer part-->

        <div class="footer">
            <p>Abishir plc copyright reserved &#169; </p>
            <div class="foot">
            <div class="left">
                <ul>
                    <li>our Contact</li>
                    <li>phone number</li>
                    <li>content</li>
                    <li>main office</li>
                </ul>
            </div>
            <div class="center">
                <nav class="navfoot">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="item.html">Items</a></li>
                        <li><a href="about/aboutus.html">About</a></li>
                        <li><a href="contactuspage.html">Contact</a></li>
                        
                        <li><a href="registration form/signup.html">signup</a></li>
                        <li><a href="registration form/singin.html">signin</a></li>
                    </ul>
                </nav>
            </div>
    
            <div class="right">
                <p>terms and privacy</p>
            </div>
        </div>
        </div>
        <script type = "text/javascript" src="../js/script.js"></script>
</body>
</html>