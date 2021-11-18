<!DOCTYPE HTML>
<?php require_once('connect.php'); ?>

<html>
  <!-- Head of the page -->
  <head>
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>HotelDelLuna Staff | Home Receptionist</title>
      <link rel="stylesheet" href="stylestaff.css">
  </head>

  <body>
    <!-- Fixed navigation bar -->
      <div class="navbar">
        <!-- Top left icon -->
        <a class="nav-button" href="receptionist_home.php">Home</a>
        <a class="nav-button" href="index.html">Log out</a>
      </div>

      <div style="width: 100%; margin-top: 60px;"></div>

      <div class="home-container">
        <div class="hotel-heading">
          <h1 class="hotel-name">Hotel Del Luna</h1>
          <h2 class="hotel-location">28-5 Donhwamun-ro 11-gil, Jongno-gu</h2>
        </div>

        <div class="button-grid-layout">
          <form class="" action="guest_list.php" method="post">
            <button type="submit" name="receptionist_submit" class="hover-button" style="z-index: 1; margin: 1em; padding: 0.75em 2em 0.75em 2em;">Guest List</button>
          </form>
          <button type="button" onclick="window.location.href='check_in.php'" class="hover-button" style="z-index: 1; margin: 1em; padding: 0.75em 2em 0.75em 2em;">Check-in</button>
          <button type="button" onclick="window.location.href='check_out.php'" class="hover-button" style="z-index: 1; margin: 1em; padding: 0.75em 2em 0.75em 2em;">Check-out</button>
        </div>

      </div>


  </body>
</html>
