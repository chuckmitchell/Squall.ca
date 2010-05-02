<?php session_start();?>

<html>
<head>

	<title>User Panel - Delete Book</title>
	<link rel="stylesheet" href="style/tabstyle.css" type="text/css" />
</head>
<body style="color:white;"  background="images/wallpaper.jpg" link="#00001f" alink="#00003f"  vlink="00003f">

<?php
	if (!isset($_SESSION['user']))
	{?>
	<font color='red'>Sorry, you do not have access to this page!</font>
<?php	}
	else
	{?>
	
<center>	<img src="images/logo.jpg" alt="iwatalogo" /></center><br />
		<script type='text/javascript'>

function Go(){return}

</script>
<script type='text/javascript' src='exmplmenu_var.js'></script>
<script type='text/javascript' src='menu_com.js'></script>
<noscript>Your browser does not support script</noscript>


<br /><fieldset>
			
				<center><font color='red'><h4>Deletion Status</h4></font></center>
				<?php
                    
				    $itemNum = (int)$_GET['id'];
                                    include ('../includes/connection.php');
                                    $query = mysql_query("DELETE FROM books WHERE id=$itemNum");
                                    echo "<script type='text/javascript'>
		  				window.location = 'project-management.php';
  				</script>";
				?>
				
			</fieldset>
<?php	} ?>
</body>
</html>
