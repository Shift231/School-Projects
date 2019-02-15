<!--
Leslie Col-iteng 000772220
Date: October 23 2018

This will update the selected record


I, Leslie Col-iteng, 000772220, certify that this material 
is my original work. No other person's work has been used 
without due acknowledgement.
-->
<style type = "text/css">
    input,select{
        height: 25px;
        width: 150px;
    }

    td{
        margin: 5px;
    }

    th{
        text-align: left;
    }

    button{
        height: 25px;
        width: 100px;
        border-radius: 3px;
        border: 1px solid black;
        background-color: chocolate;
    }

    button:hover{
        background-color: orange;
        color: white;
    }
    
    body{
        color: white;
        font-family: verdana, sans-serif;
    }

</style>


<?php
//verify if page was accessed directly
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("location: index.html");
}
//creates table for the input and its titles
echo "<fieldset><table>"
 . "<tr>"
 . "<th>Bike ID</th>"
 . "<th>Bike Type</th>"
 . "<th>Brand</th>"
 . "<th>Model</th>"
 . "<th>Date Ridden</th>"
 . "<th>Rating</th>"
 . "</tr>";

$rideID = $_POST['edit'];
try {
    $dbh = new PDO("mysql:host=localhost;dbname=000772220", "000772220", "19951212"); //access the table
} catch (Exception $e) {
    die("Connection Error! Can't Connect to Database");
}

$command = "SELECT * FROM Bike_Catalog WHERE Ride_ID = $rideID"; // look for the right record
$stmt = $dbh->prepare($command);
$stmt->execute();

while ($row = $stmt->fetch()) {
    $_SESSION["rideID"] = $row['Ride_ID'];
    echo "<tr><form method = 'post' action = 'update.php'><td>" . $row['Ride_ID'] . "</td>" //get the values of the record and place them in the right input box
    . "<td><select name = 'updType'>"
    . "<option value = $row[Bike_Type] selected >Default ($row[Bike_Type])</option>"
    . "<option value = 'RC'>RC</option>"
    . "<option value = 'TR'>TR</option>"
    . "<option value = 'AM'>AM</option>"
    . "<option value = 'EN'>EN</option>"
    . "<option value = 'DH'>DH</option>"
    . "</select></td>"
    . "<td><input type = 'text' name = 'updBrand' value = $row[Brand]></td>"    //
    . "<td><input type = 'text' name = 'updName' value = $row[Name]></td>"
    . "<td><input type = 'date' name = 'updDate' value = $row[Date_Ridden]></td>"
    . "<td><select name = 'updRating' value = {$row['Rating']}>"
    . "<option name ='5stars' value = {$row['Rating']}>Previous Rate: {$row['Rating']}</option>"
    . "<option name ='5stars' value = '5'>5 - Amazing</option>"
    . "<option name ='4stars' value = '4'>4 - Very Good</option>"
    . "<option name ='3stars' value = '3'>3 - Could be Better</option>"
    . "<option name ='2stars' value = '2'>2 - Not so Bad</option>"
    . "<option name ='1stars' value = '1'>1 - Won't Ride it Again</option>"
    . "</td>"
    . "<td><button type = 'submit'>Update</button></td></form>"
    . "<form action = 'brain.php'><td><button type = 'submit'>Cancel</button></td></form></tr></table></fieldset>"; // cancel button that will reject any unsaved changes
}
?>   

