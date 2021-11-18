<?php
    $guestid = $_POST['guestid'];
    $bookid = $_POST['bookid'];
    $roomid = $_POST['roomid'];
    require_once('connect.php');

    // update roomstatus table -> Status = 0 --> room free leaw
    $q="SELECT StatusID
    FROM room
    WHERE room.RoomID = $roomid";


    $statusid = $mysqli -> query($q);
    if (!$statusid) {
        die('Error here look 13: '.$q." //// ". $mysqli->error);
    }

    $sid=$statusid->fetch_array();

    $lastsid = $sid['StatusID'];


    $q1="UPDATE roomstatus SET Status = 0
    WHERE StatusID = $lastsid";



    $result = $mysqli -> query($q1);
    if (!$result) {
        die('Error here look 24: '.$q1." //// ". $mysqli->error);
    }


    // update roomsbooked table -> Status = 0 --> check out leaw
    // $q3="SELECT booking.BookingID
    // FROM booking
    // WHERE booking.GuestID = $guestid";
    //
    //
    //
    // $bookingid = $mysqli -> query($q3);
    // if (!$bookingid) {
    //     die('Error here look 34: '.$q3." //// ". $mysqli->error);
    // }
    //
    // $bid=$bookingid->fetch_array();
    //
    // $lastbid = $bid['BookingID'];


    $q2="UPDATE roomsbooked SET Status = 0, RoomID = NULL
    WHERE BookingID = $bookid";


    $result2 = $mysqli -> query($q2);
    if (!$result2) {
        die('Error here look 45: '.$q2." //// ". $mysqli->error);
    }


    // START OF delete the booking, payment, guest, roomsbooked
    $q3 = "SELECT PaymentID FROM booking WHERE BookingID = $bookid";

    $result3 = $mysqli -> query($q3);
    if (!$result3) {
        die('Error look at q3 : '.$q3." //// ". $mysqli->error);
    }

    $pid=$result3->fetch_array();
    $paymentid= $pid['PaymentID'];


    //delete roomsbooked KABOOM TIME
    $q4 = "DELETE FROM roomsbooked WHERE BookingID = '$bookid'";
    $result4 = $mysqli -> query($q4);
    if (!$result4) {
        die('Error look at q4 : '.$q4." //// ". $mysqli->error);
    }

    //delete booking
    $q5 = "DELETE FROM booking WHERE BookingID = '$bookid'";
    $result5 = $mysqli -> query($q5);
    if (!$result5) {
        die('Error look at q5 : '.$q5." //// ". $mysqli->error);
    }

    //delete payment
    $q6 = "DELETE FROM payment WHERE PaymentID = '$paymentid'";
    $result6 = $mysqli -> query($q6);
    if (!$result6) {
        die('Error look at q6 : '.$q6." //// ". $mysqli->error);
    }

    //delete guest
    $q7 = "DELETE FROM guest WHERE GuestID = '$guestid'";
    $result7 = $mysqli -> query($q7);
    if (!$result7) {
        die('Error look at q7 : '.$q7." //// ". $mysqli->error);
    }

    echo "<br>";
    echo "--roomsbooked.Status updated--";

    header("Location: receptionist_home.php");

?>
