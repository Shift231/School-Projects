<!--
Leslie Col-iteng 000772220
Date: October 23 2018

This page is the main processing area for the website. Using the values passed from the main page,
the page accesses the database either to make certain changes, or just to get values that are to be
displayed in the main page.


I, Leslie Col-iteng, 000772220, certify that this material 
is my original work. No other person's work has been used 
without due acknowledgement.
-->
<style type = "text/css">
    table,td,th{
        border: 2px solid black;
        margin-left: auto;
        margin-right: auto;
        border-radius: 5px;
    }

    table{
        padding: 10px;
        background-image: url("images/table.PNG");
    }

    th{
        padding: 10px;
        padding-left: 30px;
        padding-right:30px;
    }

    body{
        width: 80%;
        margin-left: auto;
        margin-right: auto;
        font-family: verdana , sans-serif;
    }

    td{
        padding: 5px;
    }

    button img{
        width: 25px;
    }

    .edit{
        background-image: url("images/edtBG.PNG");
    }

    .delete{
        background-image: url("images/delBack.PNG");
    }

    button:hover{
        background-color: orange;
    }


</style>

<?php
session_start();
//verify that page is not accessed directly
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("location: errorPage.php");
} else {
    //access the database
    try {
        $dbh = new PDO("mysql:host=localhost;dbname=000772220", "000772220", "19951212");
    } catch (Exception $e) {
        die("Connection Error! Can't Connect to Database");
    }

    //select statements that will be used to isolate records as requested by the user
    if (isset($_POST['byBrand'])) {
        $search = filter_input(INPUT_POST, "byBrand", FILTER_SANITIZE_SPECIAL_CHARS);
        $command = "SELECT * FROM Bike_Catalog WHERE Brand = '$search' ";
    } elseif (isset($_POST['byModel'])) {
        $search = filter_input(INPUT_POST, "byModel", FILTER_SANITIZE_STRING);
        $command = "SELECT * FROM Bike_Catalog WHERE Name = '$search' ";
    } elseif (isset($_POST['byType'])) {
        $search = filter_input(INPUT_POST, "byType", FILTER_SANITIZE_SPECIAL_CHARS);
        $command = "SELECT * FROM Bike_Catalog WHERE Bike_Type = '$search' ";
    }
    //a show all button that will display all the records
    elseif (isset($_POST['showAll'])) {
        $command = "SELECT * FROM Bike_Catalog ORDER BY Ride_ID";
    } else {
        //default select statement that will be used when the main page is accessed for the first time
        $command = "SELECT * FROM Bike_Catalog ORDER BY Ride_ID";
    }

    $stmt = $dbh->prepare($command);
    $stmt->execute();

    echo "<table><tr><td colspan='6'>Name:" . $_SESSION['username'] . "'s Bike Rides </td></tr>";
    echo "<tr>";
    echo "<th>Ride ID</th>";
    echo "<th>Bike Type</th>";
    echo "<th>Brand</th>";
    echo "<th>Model</th>";
    echo "<th>Date Ridden</th>";
    echo "<th>Rating/5</th>";
    echo "</tr>";
    while ($row = $stmt->fetch()) {
        echo"<tr><td>" . $row['Ride_ID'] . "</td>"
        . "<td>" . $row['Bike_Type'] . "</td>"
        . "<td>" . $row['Brand'] . "</td>"
        . "<td>" . $row['Name'] . "</td>"
        . "<td>" . $row['Date_Ridden'] . "</td>"
        . "<td>" . $row['Rating'] . "</td>"
        . "<form method = 'post' action = 'delete.php'>"  //a form for the delete button
        . "<td class = 'delete'><button type = 'submit' name = 'rideID' value = $row[Ride_ID] >"    //delete button added in the table array that will contain the Ride_ID value
        . "<img src = 'images/delete.png' alt = 'delete button' title = 'Delete' alert = 'Record Deleted'></button></td></form>"    //a form for the edit button
        . "<form method = 'post' action = 'edit.php'><td class = 'edit'><button type = 'submit' name = 'edit' value = '$row[Ride_ID]'>" //edit button added in the table array that will contain the Ride_ID value
        . "<img src = 'images/editIcon.png' alt = 'edit button' title = 'Edit'></button></td></form></tr>";
    }
    echo "</table>";
}
?>
        