<!--
Leslie Col-iteng 000772220
Date: October 23 2018

The error page where all the pages redirect when they are accessed directly

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
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    echo "<h2 class = 'animate'>ERROR: YOU MUST LOG IN FIRST</h2>";
    echo "<p class = 'animate'><a href = 'index.html'>Click Here To Go to the Log In Page</a></p>";
}
?>
