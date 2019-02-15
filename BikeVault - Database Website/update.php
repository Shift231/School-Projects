<!--
Leslie Col-iteng 000772220
Date: October 23 2018

This file updates the record that corresponds with the Ride_ID that was passed by the
edit button in the brain php file.


I, Leslie Col-iteng, 000772220, certify that this material 
is my original work. No other person's work has been used 
without due acknowledgement.
-->
<?php
session_start();
//verify that page is not accessed directly
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("location: errorPage.php");
} else {
    try {
        $type = $_POST['updType'];
        $brand = filter_input(INPUT_POST, 'updBrand', FILTER_SANITIZE_SPECIAL_CHARS);
        $model = filter_input(INPUT_POST, 'updName', FILTER_SANITIZE_STRING);
        $date = $_POST['updDate'];
        $rating = filter_input(INPUT_POST, 'updRating', FILTER_SANITIZE_NUMBER_INT);


        $dbh = new PDO("mysql:host=localhost;dbname=000772220", "000772220", "19951212");
    } catch (Exception $e) {
        die("Connection Error! Can't Connect to Database");
    }
//update script
    $command = "UPDATE Bike_Catalog SET Bike_Type = '$type', Brand = '$brand', Name = '$model', Date_Ridden = '$date', Rating = '$rating' "
            . " WHERE Ride_ID = '{$_SESSION["rideID"]}'";

    $stmt = $dbh->prepare($command);
    $success = $stmt->execute();

    if ($success) {
        header("location: brain.php");
    } else {
        echo $_SESSION["rideID"] . " error";
        echo " " . $command;
    }
}
?>
