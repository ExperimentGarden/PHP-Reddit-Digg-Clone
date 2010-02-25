<?php
if(!defined("SECURE"))
{
  //Someone is trying to access this page directly without going through the proper
  //channel, a classic hacker ploy, so trick the sneaky hacker into thinking
  //that the page doesn't exist.  This is a good combination of security and obscurity.
  header('HTTP/1.1 404 Not Found');
  echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n";
	echo "<html><head>\n<title>404 Not Found</title>\n</head><body>\n";
	echo "<h1>Not Found</h1>\n";
  echo "<p>The requested URL ".$_SERVER['REQUEST_URI']." was not found on this server.</p>\n";
	echo "</body></html>";
	exit;
}
?>	

<?php

// This file handles the initialization logic.
// It handles session control, connects to the database server and recreates the database
// structure if needed.

//Start a new sesssion for this user if necessary.
if(session_id()=="")
{
  session_start();  
  header("Cache-control: private");
}

//Database connection details.
$config_database_username="test";
$config_database="test";
$config_password="testtest";

//Connect to a database server which is on the same machine at port 3306
$dbcnx = mysql_connect("127.0.0.1:3306", $config_database_username, $config_password)
         or die("Unable to connect to the database. <br>  Please check your settings in config.php!");
         
//Find the desired database on the connected server.
mysql_select_db($config_database) or die("Unable to select the database schemata. <br>  Please check your settings in config.php!");

//See if the necessary database tables need to be reinstalled.
$result = mysql_query("select * from options where optionName='installed'");
if($result==0)
{
  include "logic/logic.install.php";  //Run the install logic.
}

?>