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
    <!-- end #mainContent -->
</div>
  <table width="70%" border="0">
  <?php
    //get categories from database
    $result = mysql_query("SELECT * FROM `categories`",$link);
    $i=1;
    //this loop will continue till all categories are read one by one
    while($r = mysql_fetch_object($result)){//2 Name image $r->name;
        if($i==1){
    ?>
            <tr>
    <?php
        }
    ?>
      <th width="33%" scope="col"><p align="center"><a href="list.php?catid=<?php echo $r->id?>"><img src="pictures/<?php echo $r->image;?>" width="133" alt="nopicture" height="123" /></a></p>
    <p align="center"><a href="list.php?catid=<?php echo $r->id?>"><?php echo $r->name;?></a></p></th>
<?php      if($i==3){
            $i=0;
    ?>
            </tr>
    <?php
       }//end of if
       $i++;
        }?>
  </table>
   <br class="clearfloat" />
   <div id="footer" class="stripe">
      <p align="center">© 2010 BookTrend</p>
      <!-- end #footer -->
    </div>
  </div>
</body>
</html>
