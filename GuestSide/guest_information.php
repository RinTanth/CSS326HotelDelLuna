<!DOCTYPE html>

<?php require_once('connect.php');  //connect to phpmyadmin?>

<?php
// takes information from the rooms available page

if (isset($_POST['book_submit']))   {
    $roomtypeID = $_POST['book_submit'];
}

$q = "SELECT * FROM RoomType WHERE TypeID = $roomtypeID";
$result = $mysqli -> query($q);

if (!$result)  { ?>
  <h1>Error connecting to server</h1>;
<?php }

else  {
  $row = $result -> fetch_array();
}
?>

<html>
  <!-- Head of the page -->
  <head>
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Hotel Del Luna | Booking Information</title>
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
                    <li><a href='#'>Rooms and Suites</a></li>
                    <li><a href='#'>Services</a></li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
      </div>

    <!-- Home screen image and text 
      <div class="background-splash">
        <div class="cover-text">Guests details</div>
      </div> -->

    <!-- Guest Form Container -->
    <form name="guest-info-form" action="test.php" method="post">
      <div class="container-two-columns" style="height: auto">

        <div class="two-even-columns">
          <div class="container-guest-form">
            <div class="guest-form-label">Guest information</div>
              <div class='fill-data-block'>
                  <select id="prefix" name="prefix">
                    <option value="Mister">Mr.</option>
                    <option value="Miss">Ms.</option>
                    <option value="Missus">Mrs.</option>
                    <option value="Doctor">Dr.</option>
                    <option value="Professor">Prof.</option>
                  </select> 
                  

                  <input type="text" id="fname" name="fname" placeholder="First name">
                  <input type="text" id="lname" name="lname" placeholder="Last name">			
              </div>


              <div class='fill-data-block'>
                  <input type="text" id="email" name="email" placeholder="Email address">
    
                  <input type="text" id="phonenum" name="phonenum" placeholder="Phone number">
              </div>


              <div class='fill-data-block'>
                    <select id="country" name="country" placeholder="Country">
                      <option value="test1">Black Legion</option>
                      <option value="test2">Thousand Sons</option>
                      <option value="test3">World Eaters</option>
                      <option value="test4">Death Guard</option>
                      <option value="test5">Emperor's Children</option>
                    </select> 
              </div>

              <!-- Payment Section -->
              <div class="guest-form-label">Payment information</div>

              <div class='fill-data-block'>
                  <select id="method" name="method" >
                    <option value="Bank">Credit Card</option>
                    <option value="Crypto">Crypto</option>
                    <option value="Kidneys">Your Kidney</option>
                  </select> 
              </div>

              <div class='fill-data-block'>
                  <input type="text" id="Ricardo" name="cardnum" placeholder="Card number">
              </div>

              <div class='fill-data-block'>
                  <input type="text" id="exp" name="exp" placeholder="Expiration date (MM/YY)">
                  <input type="text" id="CV" name="CV" placeholder="CV2">
              </div>
          </div>
        </div>

        <div class="two-even-columns" style="background-color: var(--metal_blue); padding-top: 100px; height: auto;">
          <div class="room-type-box">
            <div class="box-image" style="background-image: url(<?php echo $row['ImageLink'];?>)">
            </div>
            <h1><?php echo $row['Name'];?></h1>
            <h2>$<?php echo $row['Price'];?> per night</h2>
            <h2>Total Cost: $<?php echo $row['Price']*4;?></h2>
          </div>
        </div>

      </div>

      <div class="button-area">
          <button type="submit" class="confirm-book-button yellow_button">Confirm booking</button>  
      </div>
    </form>
    <!-- End of Guest Form Container -->


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
