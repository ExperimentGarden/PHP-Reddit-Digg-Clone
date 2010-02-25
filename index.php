<?php

//This is where it all begins.

define("SECURE",1);  //A defined variable used to prevent direct access to the logic and content
                     //modules.

error_reporting(E_ALL ^ E_NOTICE);  //Report every error except notices.  Only for debugging purposes.

include "logic/logic.initialize.php";  //Get access to the MySQL database.
include "logic/logic.submission.php";  //Check for form input. (registration, login, etc.)

include "content/content.header.php";  //Output the page header.

//Is the user logged in?
if($_SESSION['loggedIn'])
{
 	include "content/content.loggedIn.php";  //Output content for logged in users.
}
else
{
	include "content/content.loggedOut.php";  //Output content for users who aren't logged in.
}


include "content/content.footer.php";  //Output the page footer.

?>


