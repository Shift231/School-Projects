<!--
Leslie Col-iteng 000772220
Date: October 23 2018

This will be the main page of the website where users can access their ride database.
Here, users can add, edit, delete, and search for records in their database.

I, Leslie Col-iteng, 000772220, certify that this material 
is my original work. No other person's work has been used 
without due acknowledgement.
-->
<?php
session_start();
//checks if this page was accesses throught the log in page
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("location: errorPage.php"); // if accessed directly, then user is redirected to the error page.
}
?>


<style type= "text/css">
    header img{
        width: 100%;
        border-radius: 5px;
    }

    header{
        margin:0px;
    }
    #navigation{
        float: left;
        width: 30%;
    }

    #frame{
        float: left;
        width:70%
    }

    .iframeA{
        width: 99%;
        height: 80vh;
        margin-top: 8px;
        border: 2px solid chocolate;
        border-radius: 5px;
    }

    .iframeB{
        width: 98%;
        height: 22vh;
        border: none;
    }

    body{
        margin-top: 0px;
        width: 80%;
        margin-left: auto;
        margin-right:auto;
        background-image: url("images/bodyback.jpg");
        color: white;
    }

    td{
        padding-right: 5px;
        text-align: right;
    }

    .button{
        margin: auto;
        padding: 10px;
        width: 100px;
        border-radius: 3px;
        border: 1px solid orange;
        background-color: chocolate;
    }

    .button2{
        border-radius: 3px;
        border: 1px solid orange;
        background-color: chocolate;
        padding: 2px;
        padding-left: 5px;
        padding-right: 5px;
    }

    button:hover{
        background-color: orange;
        color: white;
    }

    .button3{
        border-radius: 3px;
        border: 1px solid orange;
        background-color: chocolate;
        padding: 10px;
        font-size: 15px;
        margin: 0px;
    }

    .button4{
        border-radius: 3px;
        border: 1px solid black;
        background-color: darkred;
        padding: 10px;
        font-size: 15px;
        color: wheat;
        margin: 0px;
    }

    h2{
        text-align: center;
        margin: 2px;
    }

    h3{
        text-align: right;
        margin: 2px;
    }

    legend{
        font-weight: bolder;
        font-family: verdana , sans-serif;
        font-size: 20px;
        color: black;
        color: brown;
    }

    fieldset{
        border: 2px solid chocolate;
        margin-bottom: 10px;
        border-radius: 5px;
        padding: 10px;
        margin-right: 3px;
    }

    input:active{
        border-color: 2px solid black;
    }


    a{
        text-decoration: none;
        font-weight: bold;
        color: white; 
    }

    a:hover{
        color: orange;
    }

    #foot{
        clear:both;
        text-align: center;
        border-top: 2px solid chocolate;
        font-family: verdana , sans-serif;
    }

    label{
        font-weight: lighter;
        font-family: verdana , sans-serif;
    }

    input{
        size: 10px;
    }

    .fromleft{
        position: absolute;
        animation: fromleft 2s;
        animation-fill-mode: forwards;
        font-size: 90px;
        color: white;
        font-family: verdana , sans-serif;
    }

    @keyframes fromleft{
        from{
            left: -400px;
            top:200px;
            opacity: 0;    
        }
        to{
            left: 230px;
            top:200px;
            opacity: 1;
        }
    }

</style>

<header>
    <img src = "images/header.jpg">
    <h1 class = 'fromleft'><a href = "#aboutus">BIKE GARAGE</a></h1>
</header>

<div id="navigation">
    <fieldset> 
        <legend>Search Your Database</legend>

        <form action = 'destroy.php'><h3><button type = "submit" class = "button4">Log Out</button></h3></form><!--Button for logging out and destroying the current session-->

        <!--Form for searching records based on their attributes/values-->
        <form method = "post" action = "brain.php" target = "view">  
            <fieldset>
                <legend>Search by Brand</legend>
                <input type = "text" name = "byBrand" placeholder = "Enter Brand Name" required>
                <button type = "submit" name = "searchSubmit" class="button2" >Search</button>
            </fieldset>
        </form>

        <form method = "post" action = "brain.php" target = "view" >
            <fieldset>
                <legend>Search by Model</legend>
                <input type = "text" name = "byModel" placeholder = "Enter Model Name" required>
                <button type = "submit" name = "searchSubmit" class="button2">Search</button>
            </fieldset>
        </form>

        <form method = "post" action = "brain.php" target = "view">     
            <fieldset>
                <legend>Search by Type</legend>
                <select name = "byType">
                    <option value = "RC">RC</option>
                    <option value = "TR">TR</option>
                    <option value = "AM">AM</option>
                    <option value = "EN">EN</option>
                    <option value = "DH">DH</option>
                </select>
                <button type = "submit" name = "searchSubmit" class="button2">Submit</button>
            </fieldset> 
        </form>

        <form method = "post" action = "brain.php" target = "view">  
            <h2><button type = "submit" name = "showAll" class = "button3">Show All</button></h2>
        </form>

    </fieldset>

    <!--Form to create a new record that will be added to the database-->
    <form method = "post" action = "create.php" target = "view">
        <fieldset>
            <table>
                <legend>Add a New Bike</legend>
                <tr><td><label for = "brand" required>Manufacturer: </label></td>
                    <td><input type = "text" name = "brand" required></td>
                    <td><label for = "type">Type: </label></td>
                    <td><select name = "type">
                            <option value = "RC">RC</option>
                            <option value = "TR">TR</option>
                            <option value = "AM">AM</option>
                            <option value = "EN">EN</option>
                            <option value = "DH">DH</option>
                        </select></td></tr>
                <tr><td><label for = "model" required>Model: </label></td>
                    <td><input type = "text" name = "model"></td>
                    <td colspan = 2 rowspan = 2><button type = "submit" name = "create" target ="errorPage.php" value = "create" class = "button">Add</button></td></tr>
                <tr><td><label for = "dateRidden">Date: </label></td>
                    <td><input type = "date" name = "dateRidden"></td></tr>
                <tr><td><label for = "rating">Rating: </label></td>
                    <td><select name = "rating">
                            <option name ="5stars" value = "5">5 - Amazing</option>
                            <option name ="4stars" value = "4">4 - Very Good</option>
                            <option name ="3stars" value = "3">3 - Could be Better</option>
                            <option name ="2stars" value = "2">2 - Not so Bad</option>
                            <option name ="1stars" value = "1">1 - Won't Ride it Again</option>
                        </select></td></tr>
            </table>
        </fieldset>
    </form>
    <iframe src = "errorPage.php" name = "errorView" class = "iframeB"></iframe>
</div>


<div id = "frame">
    <iframe src = "brain.php" name = "view" class = "iframeA"></iframe> <!--This serves as the view window for the record table that was processed by the brain.php-->
</div>

<div id = "foot">
    <footer>
        <p>ONLINE BIKE GARAGE * P.O Box-4455 * BESTCITY, ON * N0T 2DO
            <br>Image credit: http://www.Google.ca/imghp?hl=en&tab=wi</p>
    </footer>
</div> 

