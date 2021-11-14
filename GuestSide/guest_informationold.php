<!DOCTYPE html>

<?php
// takes information from the rooms available page

if (isset($_POST['book_submit']))   {
    $roomID = $_POST['book_submit'];
    echo $roomID;
}

?>

<html>
  <!-- Head of the page -->
  <head>
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Hotel Del Luna | Guest Information</title>
      <link rel="stylesheet" href="style.css">
  </head>

  <body>






  <!-- Bottom Footer container -->
  <div class="container-bottom-footer">
    <div class="column-footer-left">
      <a href="#" class="footer-option">About us</a>
      <a href="#" class="footer-option">Reverse a Room</a>
      <a href="#" class="footer-option">Rooms and Suites</a>
      <a href="#" class="footer-option">Services</a>
    </div>

    <div class="column-footer-center">
      <span class="bottom-footer-block">
        <i class="material-icons" style="font-size:25px; color:#E9D086;">place</i>
        <a class="footer-info-title">Address</a>
        <a class="footer-info">28-5 Donhwamun-ro 11-gil, Nakwon-dong, Jongno-gu</a>
      </span>

      <span class="bottom-footer-block">
        <i class="material-icons" style="font-size:25px; color:#E9D086;">mail</i>
        <a class="footer-info-title">Email</a>
        <a class="footer-info">lunadelhotel@g.siit.tu.ac.th</a>
      </span>

    </div>

    <div class="column-footer-right">
      <span class="bottom-footer-block">
        <i class="material-icons" style="font-size:25px; color:#E9D086;">phone</i>
        <a class="footer-info-title">Phone</a>
        <a class="footer-info">02-420-6969</a>
      </span>
    </div>
  </div>

  </body>
</html>
