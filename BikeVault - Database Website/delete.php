<!--
Leslie Col-iteng 000772220
Date: October 23 2018

This file will delete the record that corresponds with the Ride_ID that was passed by
the delete button in the brain php.


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
        $rideID = $_POST['rideID'];

        $dbh = new PDO("mysql:host=localhost;dbname=000772220", "000772220", "19951212");
    } catch (Exception $e) {
        die("Connection Error! Can't Connect to Database");
    }
//delete script
    $command2 = "DELETE FROM Bike_Catalog WHERE Ride_ID = '$rideID' ";

    $stmt = $dbh->prepare($command2);
    $success = $stmt->execute();

    if ($success) {
        header("location: brain.php"); //access the brain php again to display the table    
    }
}
?>