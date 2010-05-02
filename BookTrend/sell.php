<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php include('includes/connection.php');
      include('includes/upload.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BookTrend Kingston University</title>
<link href="booktrend.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="javascript/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="javascript/jquery.validate.js" ></script>

<script type="text/javascript">
  
  $(document).ready(function() {
    $("#bookform").validate();
  });

</script>


</head>
<body class="twoColFixLtHdr">

<div id="container">
  <div class="stripe"></div>
  <div id="header">
    <table width="100%" border="0">
      <tr>
        <th width="50%" height="106" scope="col"><img src="bt.jpg" width="433" height="98" /></th>
        <th width="50%" scope="col">
        <div>
        <table border="0" cellpadding="0" width="100%">
          <tr>
            <td align="center">
              <form method="get" action="search.php">
              <input type="text" name="query" size="20" maxlength="100%" value="" />
              <input type="submit" value="Search" />
              </form>
            </td>
          </tr>
        </table>
        </div>
        </th>
      </tr>
    </table>
    <!-- end #header -->
  </div>
  <div id="sidebar1">
    <p><img src="pictures/icons/house.png" alt="home" />&nbsp;<a href="index.php">Home</a></p>
    <p><img src="pictures/icons/magnifier.png" alt="home" />&nbsp;<a href="aboutus.php">About Us</a></p>
    <p><img src="pictures/icons/money_pound.png" alt="home" />&nbsp;<a href="sell.php">Sell</a></p>
    <p><img src="pictures/icons/email.png" alt="home" />&nbsp;<a href="contactus.php">Contact Us</a></p>
    <p>
      <!-- end #sidebar1 -->
    </p>
  </div>
  <div id="mainContent">
    <!-- end #mainContent -->
</div>

<?php
if (!$_POST){
 ?>
  <table width="70%" border="0">
      <form id="bookform" name="bookform" class="cmxform" method="post" enctype="multipart/form-data" action="">
    <tr>
      <td><label for="fname">Full Name:</label></td>
      <td>        
          <input type="text" name="fname" id="fname" class="required" minlength="2" />
      </td>

    </tr>
    <tr>
      <td><label for="email">Email:</label></td>
      <td>
          <input type="text" name="email" id="email" class="required email" />
      </td>
    </tr>
      <tr>
      <td><label for="title">Book Title:</label></td>
      <td>
          <input type="text" name="title" id="title" class="required" minlength="2" />
      </td>
    </tr>
      <tr>
      <td><label for="author">Book Author:</label></td>
      <td>
          <input type="text" name="author" id="author" class="required" minlength="2" />
      </td>
    </tr>
      <tr>
      <td><label for="price">Price:</label></td>
      <td>
          <input type="text" name="price" id="price" class="required number"/>
      </td>
    </tr>

    <tr>
      <td><label for="category">Category:</label></td>
<td><select name="category" id="category" class="required ">
    <?php
    //get categories from database
    $result = mysql_query("SELECT * FROM `categories`",$link);
    $i=1;
    //this loop will continue till all categories are read one by one
    while($r = mysql_fetch_object($result)){

      ?>
        <option value="<?php echo $r->id; ?>"><?php echo $r->name;?></option>
    <?php
    }
    ?>
    </select></td>
    </tr>
    <tr>
        <tr>
      <td><label for="bookimage">Book Image:</label></td>
      <td>
          <input type="file" name="bookimage" id="bookimage" />
      </td>
    </tr>
      <td><label for="description">Description:</label></td>
      <td>
          <textarea name="description" id="description" cols="45" rows="5" class="required"></textarea>
     </td>
    </tr>

    <tr>
      <td><p>&nbsp;</p></td>
      <td>
          <input type="submit" class="submit" name="Submit" id="Submit" value="Submit" />
       </td>
    </tr>
          </form>
  </table>
 <?php
    }
    else{
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $price = (double)$_POST['price'];
        $category_id = (int)$_POST['category'];
        $description = $_POST['description'];
        $book_img = rand(11,99999999);
        $book_image = $book_img.".jpg";


        $thumbnail = new upload($_FILES['bookimage']);
        			if ($thumbnail->uploaded)
        			{
        				$thumbname = $book_img;
        				$thumbnail->file_new_name_body = $thumbname;
        				$thumbnail->image_convert = jpg;

        				$thumbnail->process('pictures/');

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
                            $book_image="default.jpg";
                    }


$check = mysql_query("INSERT INTO books (book_title,book_author,book_image,book_description,s_fullname,s_email,book_price,book_category_id) VALUES('$title','$author','$book_image','$description','$fname','$email','$price','$category_id')");


          echo "Submission successful. <a href='index.php'>[Click Here]</a> to return.";

    }
 ?>
    <p><br class="clearfloat" />
  </p>
  <div id="footer" class="stripe">
    <p align="center">© 2010 BookTrend</p>
  <!-- end #footer --></div></div>
</body>
</html>
