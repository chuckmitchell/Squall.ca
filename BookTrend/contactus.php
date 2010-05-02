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
    $("#contactform").validate();
  });

</script>


</head>
<body class="twoColFixLtHdr">

<div id="container">
  <div class="stripe"></div>
  <div id="header">
    <table width="100%" border="0">
      <tr>
        <th width="50%" height="106" scope="col"><img src="bt.jpg" width="368" height="98" /></th>
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
    </p>
  </div>
  <div id="mainContent">
    <!-- end #mainContent -->
</div>

<?php
if (!$_POST){
 ?>
  <table width="70%" border="0">
      <form id="contactform" name="contactform" method="post" enctype="multipart/form-data" action="contactus.php">
    <tr>
      <td ><label for="fname">Full Name:</label></td>
      <td>
          <input type="text" name="fname" id="fname" class="required" />
      </td>

    </tr>
    <tr>
      <td><label for="email">Email:</label></td>
      <td>
          <input type="text" name="email" id="email" class="required email" />
      </td>
    </tr>
    <tr>
      <td><label for="description">Feedback/Query:</label></td>
      <td>
        <textarea name="description" id="description" cols="45" rows="5" class="required"></textarea>
     </td>
    </tr>

    <tr>
      <td><p>&nbsp;</p></td>
      <td>
        <label>
          <input type="submit" name="Submit" id="Submit" value="Submit" />
        </label>
       </td>
    </tr>
          </form>
  </table>
 <?php
    }
    else{
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $description = $_POST['description'];
        $message = "Full Name: $fname - Email: $email - Message: $description";//string..
        mail($contact_email, 'New Feedback',$message);//mail('to','subject','message');

        echo "Query submitted successfully. You'll be contacted shortly.";

    }
 ?>
    <p><br class="clearfloat" />
  </p>
  <div id="footer" class="stripe">
    <p align="center">© 2010 BookTrend</p>
  <!-- end #footer --></div></div>
</body>
</html>
