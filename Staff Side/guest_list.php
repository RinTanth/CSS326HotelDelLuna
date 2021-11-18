<!DOCTYPE HTML>
<?php
require_once('connect.php');
?>

<html>
  <!-- Head of the page -->
  <head>
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>HotelDelLuna Staff | Guest List</title>
      <link rel="stylesheet" href="stylestaff.css">
  </head>

  <body>
    <!-- Fixed navigation bar -->
      <div class="navbar">
        <!-- Top left icon -->

        <a class="nav-button" href="javascript: history.go(-1)">Home</a>
        <a class="nav-button" href="index.html">Log out</a>
      </div>

      <!-- used to make room from header -->
      <div style="width: 100%; margin-top: 60px;"></div>

      <h1 class="page-heading">Guest List</h1>

      <?php

          $q = "SELECT guest.Prefix, guest.Fname, guest.Lname, booking.Adults, booking.Children, booking.DateFrom, booking.DateTo, roomtype.Name , room.RoomNo
          FROM guest, booking, roomsbooked, room, roomtype
          WHERE roomsbooked.BookingID = booking.BookingID
          AND booking.GuestID = guest.GuestID
          AND roomsbooked.RoomID = room.RoomID
          AND room.TypeID = roomtype.TypeID
          AND roomsbooked.Status = 1";

          $result = $mysqli -> query($q);
          if(!$result){
              echo "Select failed. Error: ".$mysqli->error;
              return false;
          }

      ?>

      <!-- List of all guests container -->
      <div class="guest-table">

        <?php while($row=$result->fetch_array()){ ?>
        <!-- This is for 1 guest -->
        <a style="text-decoration: none; color: var(--dark_oak_brown);">
          <div class="guest-container">
            <div class="guest-container-left">
              <h1><?=$row['Prefix']?> <?=$row['Fname']?> <?=$row['Lname']?></h1>
              <h2>Guests: <?=$row['Adults']?> Adults, <?=$row['Children']?> Children</h2>
              <h2><?=$row['Name']?></h2>
              <h2>Room No. <?=$row['RoomNo']?></h2>
            </div>

            <div class="guest-container-right" style="margin-top: auto;">
              <h2>Check-in: <?=$row['DateFrom']?></h2>
              <h2>Check-out: <?=$row['DateTo']?></h2>
            </div>

          </div>
        </a>
        <!-- End of "this is for 1 guest" -->
        <?php } ?>

      </div>
      <!-- End of List of all guests container -->



  </body>
</html>
