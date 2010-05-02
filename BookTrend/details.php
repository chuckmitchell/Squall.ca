<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>BookTrend Kingston University</title>
    <link href="booktrend.css" rel="stylesheet" type="text/css" />
    <?php
        //include connection.php to initiate database connection
        include('includes/connection.php');
    ?>
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
    </table>    <!-- end #header -->
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
      <center>
          <?php
                $id=$_GET['bookid'];
                //get categories from database
                $result = mysql_query("SELECT * FROM `books` WHERE id = $id LIMIT 1",$link);
                $book_data = mysql_fetch_row($result);
           ?>
                <br/>
                <img src="pictures/<?php echo $book_data[3];?>" width="170" alt="cat" /><br/>
                <b><font color="blue"> <?php echo $book_data[1];?></font></b>
                <br /><br /></center>
                <b>Author:</b> <?php echo $book_data[2];?>
                <br/><br />
                <b>Price:</b>&nbsp;&pound; <?php echo $book_data[8];?>
                <br/><br />
                <b>Date Added:</b> <?php echo $book_data[4];?>
                <br/><br />
                <b>Added By:</b> <?php echo $book_data[6];?>
                <br/><br />
                <b>Email:</b> <?php echo $book_data[7];?>
                <br/><br />
                <b>Description:</b><br />
                <?php echo $book_data[5];?>
               

<br /><br />

    <!-- end #mainContent -->
  </div>

<br class="clearfloat" />
   <div id="footer" class="stripe">
                    <p align="center">© 2010 BookTrend</p>
  <!-- end #footer --></div></div>
</body>
</html>
