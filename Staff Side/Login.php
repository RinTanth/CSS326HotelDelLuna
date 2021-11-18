<?php 	
    $username = $_POST['username'];
    $passwd = $_POST['password'];
    require_once('connect.php'); 
    $q="select * from staff where Username='".$username."'and Passwd='".$passwd."'";

    $result = $mysqli -> query($q);
    if (!$result) {
        die('Error: '.$q." ". $mysqli->error);
    }
    $count = $result -> num_rows;
    // if result matchesm there must be one row returned
    if ($count==1){
        echo "Login Successfully";
        header("Location: Home_Recep.html");
    } else {
        echo "Wrong Username or Password";
    }
?>