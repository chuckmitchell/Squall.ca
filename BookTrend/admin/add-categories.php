<?php @session_start();?>
<html>
<head>
    <?php include ('../includes/connection.php');
	include('../includes/upload.php');
	?>
<script type="text/javascript" src="calendarDateInput.js"></script>

	<title>Panel - Add New Categories</title>
	<style>table {
font-family: cursive;
font-size: small;}
td{	text-align: left;}</style>
</head>
<body style="color:white; font-size:16px; background:url(images/wallpaper.jpg); background-attachment:fixed;" link="#00001f" alink="#00003f"  vlink="00003f">
<?php
	if (!isset($_SESSION['user']))
	{?>
	<font color='red'>Sorry, you do not have access to this page!</font>
<?php	}
	else
	{?>

<center>	<img height="60" src="images/logo.jpg" alt="rasyeklogo" /></center><br />
		<script type='text/javascript'>

function Go(){return}

</script>
<script type='text/javascript' src='exmplmenu_var.js'></script>
<script type='text/javascript' src='menu_com.js'></script>
<noscript>Your browser does not support script</noscript>


<br /><br />

<fieldset>
			<?php

				if (!$_POST)
				{?>
			<center>
				  <h2>Add New Categories</h2>

  <form id="myform" enctype="multipart/form-data" name="myform" action="<?= $_SERVER['PHP_SELF']?>" method="POST">
<table width="100%" border="1">

				    <tr>
				      <th width="108" scope="row">Category Name:</th>
				      <td width="219">
                                        <input type="text" style="width:100%;" name="catname" id="catname" />
                                      </td>
                                    </tr>
                                    <tr>
				      <th width="108" scope="row">Category Image:</th>
				      <td width="219">
                                        <input type="file" style="width:100%;" name="catimage" id="catimage" />
                                      </td>
                                    </tr>
                                    
</table>

<div class="form-row">
				<div class="field-widget">
			<input style="color:red;" type="submit" id="submit" name="submit" value="Add Category" />
			</div>
	</div>
  </form>
  </center>
				<?php
					}
					else if ($_POST)
					{

				$name = $_POST['catname'];
				$book_img = rand(11,99999999);
			        $book_image = $book_img.".jpg";
				
	
                             $thumbnail = new upload($_FILES['catimage']);
        			if ($thumbnail->uploaded)
        			{
        				$thumbname = $book_img;
        				$thumbnail->file_new_name_body = $thumbname;
        				$thumbnail->image_convert = jpg;

        				$thumbnail->process('../pictures/');

        				if($thumbnail->processed)
        				{
        					$thumbname .= ".jpg";
                                        }
        				else
        				{
        					echo 'error: '.$thumbnail->error;
        				}
        			}
                                else{
                                    echo "ERROR";
                                }

					   $query = mysql_query("INSERT INTO categories(`name`,`image`) VALUES('$name','$book_image')") or die (mysql_error($link));

					   echo "* Category Added Successfully!!";
                                           			
        ?>
        <br />

		<?php
                    }
                    			?>






</fieldset>
<?php	} ?>

</body>
</html>
