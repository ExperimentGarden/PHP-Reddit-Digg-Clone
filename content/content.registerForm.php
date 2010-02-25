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
  <h3>Register</h3>
  <b>Name</b> <br />
  <input type='text' name='registerUsername' />
  <?php
  	if($name_exists)
  	{
  		echo "The name you chose is already taken.";
  	}
  	else if($name_needed)
  	{
  	  echo "Please enter your name.";
  	}
  ?>
  <br />
  <b>Email Address</b> <br />
  <input type='text' name='registerEmail' />
  <?php
  	if($email_exists)
  	{
  		echo "That email address is already taken.";
  	}
  	else if($bad_email)
  	{
  	  echo "This doesn't look like an email address.";
  	}
  ?>
  <br />
  <b>Password</b> <br />
  <input type='password' name='registerPassword1' /> 
  <?php
  	if($password1_needed)
  	{
  		echo "Please enter a password.";
  	}
  ?>
  <br />
  <input type='password' name='registerPassword2' /> 
  <?php
  	if($password2_needed)
  	{
  		echo "Please reenter your password.";
  	}
  	else if($passwords_dont_match)
  	{
  		echo "The two passwords don't match.  Please try again.";
  	}
  ?>
  <input type='hidden' value='dummy' name='register' />
  <br /> <br />
  <input type='submit' value='Register' />
  <?php
  	if($register_success)
  	{
  		echo "You were registered successfully.";
  	}
  ?>
</form>
