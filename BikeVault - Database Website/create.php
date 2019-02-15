<!--
Leslie Col-iteng 000772220
Date: October 23 2018

This file creates the new record using the passed values from the main page.


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
//these are the attributes for the new record
    $brand = filter_input(INPUT_POST, "brand", FILTER_SANITIZE_SPECIAL_CHARS);
    $model = filter_input(INPUT_POST, "model", FILTER_SANITIZE_SPECIAL_CHARS);
    $date = $_POST["dateRidden"];
    $type = $_POST["type"];
    $rating = filter_input(INPUT_POST, "rating", FILTER_VALIDATE_INT);

    try {
        $dbh = new PDO("mysql:host=localhost;dbname=000772220", "000772220", "19951212");
    } catch (Exception $e) {
        die("Connection Error! Can't Connect to Database");
    }
//create script using the passed values
    $command = "INSERT INTO  `Bike_Catalog` (  `Bike_Type` ,  `Brand` ,  `Name` ,  `Date_Ridden` ,  `Rating` ) 
            VALUES ( '$type',  '$brand', '$model', '$date', '$rating' )";
    echo $command;

    $stmt = $dbh->prepare($command);
    $success = $stmt->execute();

    if ($success) {
        header("location: brain.php"); // access the brain php to continue displaying the table
    }
}
?>