<!DOCTYPE html>
<?php
require_once('connect.php');

$bookingid = $_GET['bookingid'];

$q = "CALL getGuestBooking('$bookingid')";

$result = $mysqli -> query($q);
if(!$result) {
  die('Error here look at q: '.$q." //// ". $mysqli->error);
}

$row = $result -> fetch_array();


$DateFrom = strtotime($row['DateFrom']);
$DateTo = strtotime($row['DateTo']);
$diff = abs($DateTo - $DateFrom);
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$TotalCost = $row['Price'] * ($days);

?>
<html>
  <!-- Head of the page -->
  <head>
      <link rel="stylesheet" href="icon-css/all.min.css">
      <link rel="stylesheet" href="icon-css/fontawesome.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Hotel De Luna | Booking information</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="stylecontainers.css">
      <link rel="stylesheet" href="stylecomponents.css">
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
                    <li><a href='#'>Services</a></li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
      </div>

    <!-- Home screen image and text -->
      <div class="background-splash" style="background-image: url(images/cover1.jpg)">
        <h1 style="top: 40%">Booking information</h1>
      </div>


      <!-- Booking Information Container -->
      <div style="postion: relative; margin-top: -200px;" class="room-container">
        <div class="room-container-left">
          <div class="room-image" style="background-image: url(<?php echo $row['ImageLink'];?>)"></div>
        </div>

        <div class="room-container-right">
            <h1><?php echo $row['Prefix'];?> <?php echo $row['Fname'];?> <?php echo $row['Lname'];?></h1>
            <h2>Email: <span><?php echo $row['Email'];?></span></h2>
            <h2>Phone: <span><?php echo $row['Telephone'];?></span></h2>

            <h2 style="font-size: 25px; padding-bottom: 0.6em;"><?php echo $row['RoomName'];?> Room</h1>  <!-- Name of room type-->
            <h2>Guests: <span><?php echo $row['Adults'];?> Adults, <?php echo $row['Children'];?> Children</span></h2>
            <h2>Check-in: <span><?php echo $row['DateFrom'];?></span></h2>
            <h2>Check-out: <span><?php echo $row['DateTo'];?></span></h2>
            <h2>Price per night: <span>$<?php echo $row['Price'];?></span></h2>
            <h2>Amount due: <span>$<?php echo $TotalCost;?></span></h2>
        </div>
      </div>


    <div style="text-align: center; padding: 2em;">
      <button onclick="location.href='index.html'" class="button-norm button-yellow" style="z-index: 1; padding: 0.7em 3em 0.7em 3em; margin-top: 1.25em; margin-right: 10px; font-size: 20px;">Proceed</button>
    </div>


      <div style="padding: 2em;"></div>



      <!-- Bottom Footer container -->
      <div class="container-bottom-footer">
        <div class="footer-section">
          <a href="about.html">About us</a>
          <a href="index.html">Book a room</a>
          <a href="rooms.php">Rooms and Suites</a>
          <a href="#">Services</a>
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
