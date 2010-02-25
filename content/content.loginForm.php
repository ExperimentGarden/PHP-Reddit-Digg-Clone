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

<form action="index.php" method="post" enctype="application/x-www-form-urlencoded">
  <h3>Log In</h3>
  <b>Email Address</b> <br />
  <input type='text' name='loginEmail' />
  <?php
  	if($unknown_email)
  	{
  		echo "Unknown email address.";
  	}
  ?>
  <br />
  <b>Password</b> <br />
  <input type='password' name='loginPassword' /> 
  <?php
  	if($wrong_password)
  	{
  		echo "Wrong password!";
  	}
  ?>
  <input type='hidden' value='dummy' name='login' />
  <br /> <br />
  <input type='submit' value='Log In' />
</form>
