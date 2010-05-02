<?php session_start();?>

<html>
<head>
<?php include ('../includes/connection.php');?>
 <script type="text/javascript">
 function myfinal() {

	var agree=confirm("Are you sure you want to delete?");

	if (agree)

		 return true;

	else

		 return false;

}
</script>
	
	<title>Book Management</title>
	
</head>
<body style="color:white; background:url(images/wallpaper.jpg); background-attachment:fixed;" link="#00001f" alink="#00003f"  vlink="00003f">


<?php
	if (!isset($_SESSION['user']))
	{?>
	<font color='red'>Sorry, you do not have access to this page!</font>
<?php	}
	else
	{?>
	
<center>	<img height="60" src="images/logo.jpg" alt="iwatalogo" /></center><br />
		<script type='text/javascript'>

function Go(){return}

</script>
<script type='text/javascript' src='exmplmenu_var.js'></script>
<script type='text/javascript' src='menu_com.js'></script>
<noscript>Your browser does not support script</noscript>


<br /><fieldset>
			
				<center>
				        <form name="myfrm" id="myfrm" action="project-management.php" method="get">

                                            Search: <input type="text" name="search" id="search" /><input type="submit" name="submit" id="submit" value="Search" />

                                        </form>
					<table width="100%" border="1">
						<tr>
							<th>Image</th>
							<th>Book Title</th>
							<th>Book Author</th>
							<th>Submitted By </th>
                                                        <th>Cost</th>
<th>Options</th>
                                                        						</tr>
						
						<?php
                                                if (!$_GET){
                                                    
                                                    $result = mysql_query("SELECT * FROM books",$link);
                                                }
                                                else if($_GET){
                                                    
                                                    $search = $_GET['search'];
                                                    $result = mysql_query("SELECT * FROM books WHERE book_title LIKE '%$search%' OR book_price LIKE '%$search%'",$link);
                                                }
                                                while ($r = mysql_fetch_object($result))
                                                {
								
						?>
								<tr>
									<td><img width="100" src="../pictures/<?php echo $r->book_image;?>" /></td>
									<td><?php echo $r->book_title; ?></td>
									<td><?php echo $r->book_author; ?></td>
                                                                        <td><?php echo $r->s_fullname; ?></td>
                                                                        <td><?php echo $r->book_price; ?></td>
                                         
                                                                        <td width="15%"><a style="color: orange;" href="delete.php?id=<?php echo $r->id; ?>">[DELETE]</a></td>
								</tr>
						<?php
							
                            }
						?>
					
					</table>
				
</center>
			</fieldset>
<?php	} ?>
</body>
</html>
