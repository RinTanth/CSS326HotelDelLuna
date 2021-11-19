<!DOCTYPE HTML>

<?php
require_once('connect.php');  //connect to phpmyadmin

$q = "SELECT * FROM roomtype";

$result = $mysqli -> query($q);
if(!$result) {
  die('Error here look at q: '.$q." //// ". $mysqli->error);
}


?>

<html>
  <!-- Head of the page -->
  <head>
      <link rel="stylesheet" href="icon-css/all.min.css">
      <link rel="stylesheet" href="icon-css/fontawesome.min.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Hotel Del Luna | Rooms and Suites</title>
      <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <!-- Fixed navigation bar -->
      <div class="navbar">
        <!-- Top left icon -->
        <a href="index.html" style="text-decoration: none;">
          <h1 class="logo">Hotel Del Luna</h1>
        </a>

        <!-- Top right hamburger menu -->
        <div class=menu-wrap>
            <input type="checkbox" class="toggler">
            <div class="hamburger"><div></div></div>
            <div class="menu">
              <div>
                <div>
                  <ul>
                    <li><a href='index.html'>Home</a></li>
                    <li><a href='about.html'>About us</a></li>
                    <li><a href='rooms.php'>Rooms and Suites</a></li>
                    <li><a href='services.html'>Services</a></li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
      </div>


    <!-- Home screen image and text -->
      <div class="background-splash" style="background-image: url('images/cover1.jpg');">
        <h1 style="font-family: Georgia; color: white;">Rooms and Suites</h1>
      </div>


    <!-- Profile Container -->
      <div class="profile-showcase-container">
        <h1>Our rooms</h1>

        <div class="profile-showcase-grid">

          <?php while($row = $result -> fetch_array())  { ?>
            <div class="room-showcase">
              <div class="room-showcase-image" style="background-image: url(<?php echo $row['ImageLink']?>)"></div>
              <h1><?php echo $row['Name']?></h1>
              <h2>$<?php echo $row['Price']?> per night</h2>
            </div>
          <?php } ?>

        </div>
      </div>
    <!-- End of Profile Container -->


    <!-- Bottom Footer container -->
    <div class="container-bottom-footer">
      <div class="footer-section">
        <a href="about.html">About us</a>
        <a href="index.html">Book a room</a>
        <a href="rooms.php">Rooms and Suites</a>
        <a href="services.html">Services</a>
      </div>

      <div class="footer-section">
        <div class="footer-information">
          <i style="font-size:25px;color:white;" class='fas fa-map-marker-alt'></i>
          <h1 style="margin-top: 17px; margin-left: 5px;">Main Headquarters</h1>
          <h2>28-5 Donhwamun-ro 11-gil, Jongno-gu</h2>
        </div>

        <div class="footer-information">
          <i style="font-size:25px;color:white;" class='fas fa-envelope-open'></i>
          <h1 style="margin-top: 17px">Email</h1>
          <h2>support@lunadelhotel.org</h2>
        </div>

      </div>

      <div class="footer-section">
        <div class="footer-information">
          <i style="font-size:25px;color:white;" class='fas fa-phone'></i>
          <h1 style="margin-top: 17px">Phone</h1>
          <h2>02-420-6969</h2>
        </div>
      </div>
    </div>
    <!-- End of Bottom Footer container -->

  </body>
</html>
