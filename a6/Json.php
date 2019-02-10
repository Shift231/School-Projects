<?php
/*
This file access the database and creates a JSON file for the acquired information.
 
December, 12, 2018
@author Leslie Col-iteng

I, Leslie Col-iteng, 000772220, certify that this material 
is my original work. No other person's work has been used 
without due acknowledgment. */

try {
    $dbh = new PDO("mysql:host=localhost;dbname=000772220", "000772220", "19951212");
} catch (Exception $e) {
    die("Connection Error! Can't Connect to Database");
}

$command = "SELECT * FROM UpdateMe Limit 10";

$stmt = $dbh->prepare($command);
$stmt->execute();

$newsFeed_array = array();

while ($row = $stmt->fetch()) {
    $newsFeed_array[] = $row;
}
echo json_encode($newsFeed_array);
?>