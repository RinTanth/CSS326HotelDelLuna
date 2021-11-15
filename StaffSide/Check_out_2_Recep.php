
<!-- INSERT THE CONNECT LINK -->
<!-- CONNECT TO THE DATABASE -->
<?php 	require_once('connect.php'); ?>
<!-- THIS IS FOR //Check_in_3_Recep.php// -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check_out_2_Recep</title>
    <link rel="stylesheet" href="style_recep.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Bootstrap-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <p class="topheadtext">Check-out</p>




    <br><br><br><br>

    <!-- NEED TO REQUEST DATA FROM THE DATA BASE -->
    <!-- MIGHT USE FIRSTNAME/LASTNAME TO SEARCH FOR DATA -->

    <!-- THINGS TO REQUEST -->
    <!-- GUEST PREFIX, FIRSTNAME, LASTNAME -->
    <!-- AMOUNT OF ADULT, AMOUNT OF CHILDREN -->
    <!-- ROOM TYPE -->
    <!-- PRICE PER NIGHT -->
    <!-- CHECK IN DATE -->
    <!-- CHECK OUT DATE -->
    <!-- TOTAL COST -->
    <!-- PAYMENT METHOD -->

    <!-- GUEST BOOKING INFORMATIONS -->

    <?php
        if(isset($_POST['minusicon'])){
            $guestid = $_POST['guestid'];
            $rtname = $_POST['rtname'];
            $bookid = $_POST['bookid'];
            // echo $guestid;
            // echo "----here----";

            $q = "SELECT guest.Prefix, guest.Fname, guest.Lname, booking.Adults, booking.Children, roomtype.Name, roomtype.Price, booking.DateFrom ,booking.DateTo ,payment.Method, room.RoomNo, room.RoomID
            FROM guest, booking, roomsbooked, room, roomtype, payment
            WHERE roomsbooked.BookingID = booking.BookingID
            AND booking.GuestID = guest.GuestID
            AND roomsbooked.RoomID = room.RoomID
            AND room.TypeID = roomtype.TypeID
            AND payment.PaymentID = booking.PaymentID
            AND guest.guestID = '$guestid'
            AND booking.BookingID = '$bookid'";

            $result = $mysqli -> query($q);
            if(!$result){
                echo "Select failed. Error: ".$mysqli->error;
                return false;
            }

            $row=$result->fetch_array();

            $DateFrom = strtotime($row['DateFrom']);
            $DateTo = strtotime($row['DateTo']);

            $diff = abs($DateTo - $DateFrom);

            $years = floor($diff / (365*60*60*24));

            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));

            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

            $TotalCost = $row['Price'] * ($days+1);

        }

    ?>



    <div class="button_center_div">
        <div class="row">
            <div class="columnleft">
                <p class="gl_name"><?=$row['Prefix']?> <?=$row['Fname']?> <?=$row['Lname']?></p> <!-- GUEST NAME -->
                <p class="gl_info">Guests: <?=$row['Adults']?> Adults <?=$row['Children']?> Children<br> <!-- GUEST ADULT/CHILDREN -->
                    <?=$row['Name']?><br> <!-- GUEST ROOM TYPE -->
                    Price per night: $<?=$row['Price']?> <br> <!-- ROOM PRICE PER NIGHT -->
                    Check-in: <?=$row['DateFrom']?> <br> <!-- GUEST CHECK IN -->
                    Check-out: <?=$row['DateTo']?></p> <!-- GUEST CHECK OUT -->
            </div>

            <div class="columnright">
                <p class="gl_rightsidepayment">Amount Due: $<?=$TotalCost?> <br> <!-- TOTAL COST -->
                    Payment Method: <?=$row['Method']?></p> <!-- PAYMENT METHOD -->
                <form action="Check_out_3_Recep.php" method="post">
                <!-- <a href="Check_out_3_Recep.php"> -->
                    <button class="confirmcheckout" name="checkoutconbutt">Confirm check-out</button> <!-- CONFIRM CHECK OUT BUTTON -->
                    <input type="hidden" value="<?php echo $guestid;?>" name="gid">
                    <input type="hidden" value="<?php echo $row['RoomNo'];?>" name="rno">
                    <input type="hidden" value="<?php echo $row['RoomID'];?>" name="rid">
                    <input type="hidden" value="<?php echo $bookid;?>" name="bookid">
                    <!-- </a> -->
                </form>
            </div>

        </div>
    </div>

    <br><br> <!-- NEED BR TO SEPARATE  -->
    <!-- CANCEL BUTTON -->
    <div class="button_center_div">
        <a href="Check_out_1_Recep.php">
            <button class="whitecancel">Cancel</button>
        </a>
    </div>


</body>
</html>
