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
      <center>
          <?php
              $id=$_GET['catid'];
              //get categories from database
              $result = mysql_query("SELECT * FROM `categories` WHERE id = $id",$link);
              $category_data = mysql_fetch_row($result);
          ?>
          <br/>
          <img src="pictures/<?php echo $category_data[2];?>" width="130" alt="cat" /><br/>
          <b> <?php echo $category_data[1];?> related books</b>
          <br /><br />
      </center>
    <!-- end #mainContent -->
  </div>
  <table border="0" width="100%">
    <thead>
        <tr>
            <th>Image</th>
            <th>Book Title</th>
            <th>Author Name</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $query= mysql_query("SELECT * FROM `books` WHERE book_category_id=$id");
    while($row = mysql_fetch_object($query)){
    ?>
      <tr>
          <td><a href="details.php?bookid=<?php echo $row->id?>"><img width="100" src="pictures/<?php echo $row->book_image;?>" alt="<?php echo $row->book_title; ?>" /></a></td>
          <td><a href="details.php?bookid=<?php echo $row->id?>"><?php echo $row->book_title;?></a></td>
          <td><?php echo $row->book_author;?></td>
          <td>&pound; <?php echo $row->book_price;?></td>
      </tr>
    <?php } ?>
    </tbody>
</table>

<div>

<br class="clearfloat" />
   <div id="footer" class="stripe">
                    <p align="center">© 2010 BookTrend</p>
  <!-- end #footer --></div></div>
</body>
</html>
