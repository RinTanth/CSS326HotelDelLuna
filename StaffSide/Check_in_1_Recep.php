
<!-- INSERT THE CONNECT LINK -->
<!-- CONNECT TO THE DATABASE -->
<?php 	require_once('connect.php'); ?>
<!-- THIS IS FOR //Check_in_1_Recep.php// -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check_in_1_Recep</title>
    <link rel="stylesheet" href="style_recep.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Bootstrap-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <p class="topheadtext">Check-in</p>


    <br><br><br><br>

    <!-- NEED TO REQUEST DATA FROM THE DATA BASE -->
    <!-- MIGHT USE FIRSTNAME/LASTNAME TO SEARCH FOR DATA -->

    <!-- THINGS TO REQUEST -->
    <!-- GUEST PREFIX, FIRSTNAME, LASTNAME -->
    <!-- AMOUNT OF ADULT, AMOUNT OF CHILDREN -->
    <!-- ROOM TYPE -->


    <?php
        $q = "SELECT guest.GuestID, guest.Prefix, guest.Fname, guest.Lname, booking.Adults, booking.Children, roomtype.Name, booking.BookingID, room.RoomNo
        FROM guest, booking, roomsbooked, room, roomtype
        WHERE roomsbooked.BookingID = booking.BookingID
        AND booking.GuestID = guest.GuestID
        AND roomsbooked.RoomID = room.RoomID
        AND room.TypeID = roomtype.TypeID
        AND roomsbooked.Status = 0";

        $result = $mysqli -> query($q);
        if(!$result){
            echo "Select failed. Error: ".$mysqli->error;
            return false;
        }

        while($row=$result->fetch_array()){
    ?>

    <div class="button_center_div">
        <div class="row">
            <div class="columnleft">
                <p class="gl_name"><?=$row['Prefix']?> <?=$row['Fname']?> <?=$row['Lname']?></p> <!-- GUEST NAME -->
                <p class="gl_info">Guests: <?=$row['Adults']?> Adults <?=$row['Children']?> Children<br> <!-- GUEST ADULT/CHILDREN -->
                    <?=$row['Name']?><br><!-- GUEST ROOM TYPE -->
                    Room: <?=$row['RoomNo']?></p> <!-- GUEST ROOM NO -->
            </div>

            <div class="columnright">
                <!-- <a href="Check_in_2_Recep.php"> -->
                <form action="Check_in_2_Recep.php" method="post">

                    <button type="submit" class="buttimg" name="plusicon">
                        <img src="image/plus2.png" class="whiteplusminus" />
                    </button>

                    <!-- <input type="submit" class="pluswhite"  name="plusicon" > -->
                    <!-- WHITE PLUS SIGN -->
                    <input type="hidden" value="<?php echo $row['Name'];?>" name="rtname">
                    <input type="hidden" value="<?php echo $row['GuestID'];?>" name="guestid">
                    <input type="hidden" value="<?php echo $row['BookingID'];?>" name="bookid">

                </form>
                <!-- </a> -->
            </div>
        </div>
    </div>

    <br>

    <?php } ?>

</body>
</html>
