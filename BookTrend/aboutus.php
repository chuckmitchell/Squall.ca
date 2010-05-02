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
     <h3>Welcome to Kingston University BookTrend service.</h3>

     <p><h4>Who We Are</h4>
     Booktrends is a <strong>free</strong> interactive service open to all students at <a href="http://www.kingston.ac.uk/">Kingston University</a>.<br />
     <br />
     If you wish to <strong>buy, sell or swap</strong> any books, you will be subject to the full Terms and Conditions  of the service.
     To buy, sell or swap any books you will need to contact the seller via the email address given and agree to the transaction.  It is down to the buyer and seller to facilitate the transaction, not the University.
     </p>
     <br />
    
     <p><h4>Advertisement Details</h4>
     Advertisements will appear for twelve weeks. If your book sells more quickly, your advertisement can be removed by emailing <a href="mailto:booktrend@kingston.ac.uk">booktrend@kingston.ac.uk</a>.
     Kingston University acts only as a venue for this service and is not responsible for the quality of books bought or sold.
     </p>
     <br />

     <p><h4>Terms and Conditions</h4>
     The terms and conditions provide detailed information about items that are not permitted to be advertised.
     Please remember that you use this site at your own risk. The University reserves the right to edit or remove material at its discretion.
     </p>
     <br />
     <br />
     <!-- end #mainContent -->
  </div>

  <br class="clearfloat" />
  <div id="footer" class="stripe">
    <p align="center">© 2010 BookTrend</p>
  <!-- end #footer --></div></div>
</body>
</html>
