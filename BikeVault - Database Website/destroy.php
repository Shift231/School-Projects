<?php

/*
  Leslie Col-iteng 000772220
  Date: October 23 2018

  This file destroys the session a user is currently in. This is where the log ou button redirects to

  I, Leslie Col-iteng, 000772220, certify that this material
  is my original work. No other person's work has been used
  without due acknowledgement.
 */


session_start();

session_destroy();

setcookie(session_name(), "", time() - 3600);

header("location: index.html"); // goes back to the log in page
?>

