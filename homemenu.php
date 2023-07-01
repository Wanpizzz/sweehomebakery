<?php
    // session_start();
    // include("connection.php");
    include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>homemenu</title>

        <!--font awesome  cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!--custom css file link-->
        <link rel="stylesheet" href="css/homemenu.css">

        <style>
            section .video-container {
                max-width: 100%; /* Adjust the maximum width as needed */
                max-height: 100%; /* Adjust the maximum height as needed */
                overflow: hidden; /* Ensures the video stays within the container */
            }

            section .video-container video {
                width: 100%; /* Makes the video fill the container width */
                height: auto; /* Maintains the video's aspect ratio */
            }
        </style>

    </head>

    <body>
        <header>
            <a href="#" class="logo"><i class="fas fa-cake-candles"></i>Sweet Home Bakery</a>
            <a href="logout.php" class="logout-btn"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
        </header>
        <section>
            <div class="video-container">
                <video src="video/video-cafe.mp4" autoplay loop muted></video>
            </div>
            <div class="wlcm">
                <h1><strong>WELCOME TO SWEET HOME BAKERY</strong></h1>
                <div class="wlm">
                    <p>Our aromatic creations will transport you to a world of culinary bliss from the moment you walk through our doors.</p>
                    <p>COME AND EXPLORE OUR BAKERY</p>
                </div>
                <div class="buttons">
                    <button id="pastryBtn">Pastry</button>
                    <button id="cakeBtn">Cake</button>
                    <button id="dessertBtn">Dessert</button>
                </div>
            </div>
        </section>
        <script>
            // JavaScript code to handle button clicks and redirect to different links
            const pastryBtn = document.getElementById("pastryBtn");
            const cakeBtn = document.getElementById("cakeBtn");
            const dessertBtn = document.getElementById("dessertBtn");

            // Add click event listeners to the buttons
            pastryBtn.addEventListener("click", function() {
                window.location.href = "pastry.php";
            });

            cakeBtn.addEventListener("click", function() {
                window.location.href = "cake.php";
            });

            dessertBtn.addEventListener("click", function() {
                window.location.href = "dessert.php";
            });
        </script>
    </body>
</html>