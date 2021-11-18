<!DOCTYPE html>
<?php session_start();
require_once('connect.php');

if(isset($_POST['submit'])) {
  $_SESSION['hotelID'] = $_POST['submit'];
}

$hotelID = $_SESSION['hotelID'];
$q = "SELECT * FROM hotel WHERE HotelID = $hotelID";

$result = $mysqli -> query($q);
$row = $result->fetch_array();


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
      <title>CinnaTel Staff | Home Manager</title>
      <link rel="stylesheet" href="stylestaff.css">
  </head>

  <body>
    <!-- Fixed navigation bar -->
      <div class="navbar">
        <!-- Top left icon -->
        <a class="nav-button" href="manager_home.html">Hotel Branches</a>
        <a class="nav-button" href="manager_hotel_home.php">Home</a>
        <a class="nav-button" href="index.html">Log out</a>
      </div>

      <div style="width: 100%; margin-top: 60px;"></div>

      <div class="home-container">
        <div class="hotel-heading">
          <h1 class="hotel-name"><?php echo $row['Name'];?></h1>
          <h2 class="hotel-location"><?php echo $row['Province'];?>, <?php echo $row['Country'];?></h2>
        </div>

        <div class="button-grid-layout">

          <form style="display: inline;" action="guest_list.php" method="post">
            <button type="submit" name="manager_submit" class="hover-button" style="z-index: 1;  margin: 1em;" value=<?php echo $hotelID?>>Guest List</button>
          </form>

          <form style="display: inline;" action="staff_list.php" method="post">
            <button type="submit" name="submit" class="hover-button" style="z-index: 1;  margin: 1em;" value=<?php echo $hotelID?>>Staff List</button>
          </form>

          <button type="button" onclick="window.location.href='edit_hotel_info.php'" class="hover-button" style="z-index: 1;  margin: 1em;">Edit Hotel Information</button>



        </div>

      </div>


  </body>
</html>
