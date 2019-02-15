<!--
Leslie Col-iteng 000772220
Date: October 23 2018

Using hard-coded password and username , this file verifies 
the passed values from the index.html. If verified, it calls 
the main page.


I, Leslie Col-iteng, 000772220, certify that this material 
is my original work. No other person's work has been used 
without due acknowledgement.
-->
<style type = "text/css">
    body{
        font-family: verdana, sans-serif;
        text-align: center;
    }

    a{
        text-decoration: none;
    }
    h1{
        color: brown;
        font-size: 40px;
        font-family: tahoma, sans-serif;
    }
    .animate{
        position:relative;
        animation:animatetop 1s;
        animation-fill-mode: forwards;
    }

    @keyframes animatetop{
        from{
            top: -300px;
            opacity: 0 ;
        }
        to{
            top: 100px;
            opacity: 1;
        }
    }
</style>


<?php
session_start();
/*
 * Checks if the login button was used to get to this page.
 * Prevents further advance to the website if validation fails.
 */
if (!isset($_POST["logInButton"])) {
    echo "<h1>You Log In First</h1>";
    echo "<a href = 'index.html'>Log In Page</a>";
}

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS); //sanitize username
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS); //sanitize password

if (($password === "Password1") && ($username === "admin")) { //verify log in credentials
    $_SESSION['username'] = $username; // store both the values in the session for it to be passed
    $_SESSION['password'] = $password;
    header("location: main.php");
} else {
    //display if password or username did not match
    echo"<h1 class = 'animate'>Invalid Username or Password</h1>";
    echo"<p class = 'animate'><a href = 'index.html'>Click Here to Go Back to Log In Page</a></p>.";
}
?>    