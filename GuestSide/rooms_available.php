<!DOCTYPE html>


<?php require_once('connect.php');  //connect to phpmyadmin?>
<?php
// takes information from the check availability form
$checkin = "";
$checkout = "";
$adults = 0;
$children = 0;

if (isset($_POST['submit']))    {
    $checkin = $_POST['check-in'];
    $checkout = $_POST['check-out'];
    $adults = $_POST['adults'];
    if ($adults == "")  {
      $adults = 0;
    }
    $children = $_POST['children'];
    if ($children == "")  {
      $children = 0;
    }
}
?>


<html>
  <!-- Head of the page -->
  <head>
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Hotel Del Luna | Rooms Available</title>
      <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <!-- Fixed navigation bar -->
      <div class="navbar">
        <!-- Top left icon -->
        <a href="main.html" style="text-decoration: none;">
          <h1 class="logo", style="color:#E9D086;">Hotel Del Luna</h1>
        </a>


        <!-- Top right hamburger menu -->
        <div class=menu-wrap>
            <input type="checkbox" class="toggler">
            <div class="hamburger"><div></div></div>
            <div class="menu">
              <div>
                <div>
                  <ul>
                    <li><a href='main.html'>Home</a></li>
                    <li><a href='about.html'>About</a></li>
                    <li><a href='rooms.html'>Rooms and Suites</a></li>
                    <li><a href='services.html'>Services</a></li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
      </div>

    <!-- Home screen image and text -->
      <div class="background-splash" style="height:450px">
        <div class="cover-text">Rooms Available</div>

        <div class="container-available-info">
          <div class="column-footer-left" style="border-right: 2px solid #001E33;">
            <h2 class="available-heading">Check In</h2>
            <a class="available-info"><?php echo $checkin;?></a>
          </div>

          <div class="column-footer-center">
            <h2 class="available-heading">Check Out</h2>
            <a class="available-info"><?php echo $checkout;?></a>
          </div>

          <div class="column-footer-right" style="border-left: 2px solid #001E33;">
            <h2 class="available-heading">Guests</h2>
            <a class="available-info"><?php echo "$adults Adults, $children Children";?></a>
          </div>

        </div>


      </div>


    <!-- Containers for list of rooms -->
      <?php //send query to the database
        //Write a query to display the room types that are free
        $q="SELECT * FROM RoomType";
        $result = $mysqli -> query($q);

        if (!$result)  { ?>
          <h1>Error connecting to server</h1>;
        <?php }

        else {
          if (mysqli_num_rows($result) == 0) { //no rooms are returned
            echo "There are no rooms available";
          }

          else { ?>

            <div class="room-card-table">
            <?php while ($row = $result -> fetch_array()){
              $serviceID = $row['ServiceID'];
              $q1 = "SELECT * FROM Services WHERE Services.ServiceID = $serviceID";
              $result1 = $mysqli -> query($q1);
              $services = $result1 -> fetch_array();

              ?>

                <div class="room-card">
                    <div class="room-card-inner">
                        <div class="room-card-front">
                          <img src=<?php echo $row['ImageLink']?> style="width:100%; height:60%; object-fit: cover;">
                          <h1 class="card-heading"><?php echo $row['Name']?></h1>
                          <p class="card-info"><?php echo $row['Description']?></p>
                          <h2 class="card-price">$<?php echo $row['Price']?>.00</h2>
                        </div>

                        <div class="room-card-back">
                          <form action="guest_information.php" method="post">
                          <h1><?php echo $services['Name']?> Service</h1>
                          <?php
                            if ($services['Spa'] == 1)  { ?>

                              <div class="service-info">
                                <i class="material-icons" style="margin-right:10px; color: var(--dark_blue);">spa</i>
                                <h2>Spa</h2>
                              </div>


                            <?php }

                            if ($services['Fitness'] == 1)  { ?>

                              <div class="service-info">
                                <i class="material-icons" style="margin-right: 10px; color: var(--dark_blue);">fitness_center</i>
                                <h2>Fitness</h2>
                              </div>


                            <?php }

                            if ($services['Lounge'] == 1)  { ?>

                              <div class="service-info">
                                <i class="material-icons" style="margin-right: 10px; color: var(--dark_blue);">weekend</i>
                                <h2>Lounge</h2>
                              </div>


                            <?php }

                            if ($services['Sauna'] == 1)  { ?>

                              <div class="service-info">
                                <i class="material-icons" style="margin-right: 10px; color: var(--dark_blue);">hot_tub</i>
                                <h2>Sauna</h2>
                              </div>

                            <?php } ?>


                          <button type="submit" name="book_submit" class="yellow_button card-button" value=<?php echo $row['TypeID']?>>Book Now</button>
                          </form>
                        </div>

                    </div>
                </div>

      <?php } ?> </div> <?php } }?>

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
