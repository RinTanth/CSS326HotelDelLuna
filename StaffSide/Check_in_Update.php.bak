<?php
    $guestid = $_POST['gid_up'];
    $roomid = $_POST['rid_up'];
    $bookid = $_POST['bid_up'];
    require_once('connect.php');

    // update roomstatus table -> Status = 1 --> room full leaw
    $q="SELECT StatusID
    FROM room
    WHERE room.RoomID = $roomid";


    $statusid = $mysqli -> query($q);
    if (!$statusid) {
        die('Error here look 13: '.$q." //// ". $mysqli->error);
    }


    $sid=$statusid->fetch_array();
    $lastsid = $sid['StatusID'];


    $q2="UPDATE roomstatus SET Status = 1
    WHERE StatusID = $lastsid";



    $result = $mysqli -> query($q2);
    if (!$result) {
        die('Error here look 24: '.$q2." //// ". $mysqli->error);
    }


    // update roomsbooked table -> Status = 1 --> check in leaw

    $q4="UPDATE roomsbooked SET Status = 1, RoomID = '$roomid'
    WHERE BookingID = $bookid";


    $result2 = $mysqli -> query($q4);
    if (!$result2) {
        die('Error here look 45: '.$q4." //// ". $mysqli->error);
    }


    header("Location: Home_Recep.html");




?>
