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

	//Set up the tables that we will store data in.
  //If these tables already exist from a previous installation, they will not changed in any way.
	$unused = mysql_query('create table if not exists members (id int not null auto_increment, primary key (id), name text, passwordHash text, email text)') 
						or die("Unable to install the member table!");
  
  //If the options are messed up you can uncomment the following line to restore everything to its
  //default.
  //$unused = mysql_query('drop table if exists global_options') or die("Failed to install correctly!");
  
  //Set up the option table if needed.
  $unused = mysql_query('create table if not exists options (optionName text, optionInt int, optionText text)')
  					or die("Failed to install correctly!");

  //Set up each option.  Currently there is only one option which indicates that the database
  //is installed correctly.
  $unused = mysql_query("insert into options set optionName='installed', optionInt=1, optionText='This is a flag for installation.'")
  					or die("Failed to install correctly!");
?>