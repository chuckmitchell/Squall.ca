<?php session_start();?>
<html>
	<head>
		<title>Book Trend - Buying and Selling Books for Kingston University Students</title>
	</head>
	<body style="color:white;background-attachment: fixed;"  background="images/wallpaper.jpg">

	<center>
		<img height="60" src="images/logo.jpg" /><br />
	<?php
		if (!$_POST)
		{
	?>
		<fieldset style="width:250px;">

			<legend><font color="orange"><b>User Login</b></font></legend>

			<br />
			<form id="myform" name="myform" action="index.php" method="POST">
				Username:<input type="text" id="username" name="username" /><br /><br />
				Password:<input type="password" id="password" name="password" /><br /><br />
			<input type="submit" id="submit" name="submit" value="Login" />
			</form>
		</fieldset>
	</center>
	<?php
		}
		else if ($_POST)
		{
                       include('../includes/connection.php');

			$username = $_POST['username'];
  			$password = md5($_POST['password']);

                        $result = mysql_query("SELECT * FROM users WHERE username LIKE '$username' AND password LIKE '$password'",$link);
                        $count = mysql_num_rows($result);

                        if($count == 1)
  			{
  				$_SESSION['user'] = $username;
  				$_SESSION['pass'] = $password;

  				echo "<script type='text/javascript'>
		  				window.location = 'adminpanel.php';
  				</script>";
			}
			else
			{

	?>
            <center>
			<fieldset style="width:250px;">
			<legend><font color="red">User Login</font></legend>
			<br />
			<form id="myform" name="myform" action="index.php" method="POST">
				Username:	<input type="text" id="username" name="username" /><br /><br />
				Password:	<input type="password" id="password" name="password" /><br /><br />
				<div align="center"><font color="red">Please enter valid username/password ...</font> </div>
			<input type="submit" id="submit" name="submit" value="Login" />
			</form>
		</fieldset>
	</center>
	<?php

			}
		}
	?>


	</body>
</html>
