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
      <title>HotelDelLuna Staff | Check-in</title>
      <link rel="stylesheet" href="stylestaff.css">
  </head>

  <body>
    <!-- Fixed navigation bar -->
      <div class="navbar">
        <!-- Top left icon -->
        <a class="nav-button" href="receptionist_home.php">Home</a>
        <a class="nav-button" href="index.html">Log out</a>
      </div>

      <!-- used to make room from header -->
      <div style="width: 100%; margin-top: 60px;"></div>

      <h1 class="page-heading">Check-in</h1>

      <?php
        $q = "SELECT guest.GuestID, guest.Prefix, guest.Fname, guest.Lname, booking.Adults, booking.Children, roomtype.Name, booking.BookingID, booking.BookingID
        FROM guest, booking, roomsbooked, roomtype
        WHERE roomsbooked.BookingID = booking.BookingID
        AND booking.GuestID = guest.GuestID
        AND roomsbooked.TypeID = roomtype.TypeID
        AND roomsbooked.Status = 0
        GROUP BY roomsbooked.BookingID";

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
        <div class="guest-container">
          <div class="guest-container-left">
            <h1><?=$row['Prefix']?> <?=$row['Fname']?> <?=$row['Lname']?></h1>
            <h2>Guests: <?=$row['Adults']?> Adults, <?=$row['Children']?> Children</h2>
            <h2><?=$row['Name']?></h2>
            <h2></h2>
          </div>

          <div class="guest-container-right">
            <form action="check_in_confirm.php" method="post">
              <button type="submit" name="submit" class="button-plus"></button>
              <input type="hidden" value="<?php echo $row['Name'];?>" name="rtname">
              <input type="hidden" value="<?php echo $row['GuestID'];?>" name="guestid">
              <input type="hidden" value="<?php echo $row['BookingID'];?>" name="bookid">
            </form>
          </div>

        </div>
        <!-- End of "this is for 1 guest" -->
        <?php } ?>

      </div>
      <!-- End of List of all guests container -->




  </body>
</html>
