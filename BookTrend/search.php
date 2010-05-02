<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include('includes/connection.php');
      include('includes/upload.php');
      include('includes/functions.php')
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>BookTrend Search</title>

<link href="booktrend.css" rel="stylesheet" type="text/css" />
<style type="text/css">
  label {font-size: 0.8em; width: 10em; float: left; }
  label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
</style>

<script type="text/javascript" src="javascript/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="javascript/jquery.validate.js" ></script>
<script type="text/javascript">
  
  $(document).ready(function() {
    //$("#bookform").validate();
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
  </div>
  <div id="mainContent">
    <!-- end #mainContent -->
</div>

<?php
if (!$_GET){
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
        //clean form input
        $query_keywords_string = mysql_real_escape_string($_GET['query']);
        //break search terms into array
        $query_terms = explode(" ",$query_keywords_string);

        

        //Collect book objects thorugh searches
        $all_matches = array();

        $category_matches = array();
        foreach($query_terms as $keyword) {
          $category_matches_query_string = "SELECT books.*, categories.name as category_name FROM books LEFT JOIN categories ON books.book_category_id = categories.id WHERE categories.name LIKE '%$keyword%'";
          $category_matches_query = mysql_query($category_matches_query_string);
          //Copy all db matches into one array
          while(($category_matches[] = mysql_fetch_assoc($category_matches_query)) || array_pop($category_matches)); 

        }

        $submitter_matches = array();
        foreach($query_terms as $keyword) {
          $submitter_matches_query_string = "SELECT books.*, categories.name as category_name FROM books LEFT JOIN categories ON books.book_category_id = categories.id WHERE books.s_fullname LIKE '%$keyword%'";
          $submitter_matches_query = mysql_query($submitter_matches_query_string);
          //Copy all db matches into one array
          while(($submitter_matches[] = mysql_fetch_assoc($submitter_matches_query)) || array_pop($submitter_matches)); 
        }

        $author_matches = array();
        foreach($query_terms as $keyword) {
          $author_matches_query_string = "SELECT books.*, categories.name as category_name FROM books LEFT JOIN categories ON books.book_category_id = categories.id WHERE books.book_author LIKE '%$keyword%'";
          $author_matches_query = mysql_query($author_matches_query_string);
          //Copy all db matches into one array
          while(($author_matches[] = mysql_fetch_assoc($author_matches_query)) || array_pop($author_matches)); 
        }


        $title_matches = array();
        foreach($query_terms as $keyword) {
          $title_matches_query_string = "SELECT books.*, categories.name as category_name FROM books LEFT JOIN categories ON books.book_category_id = categories.id WHERE books.book_title LIKE '%$keyword%'";
          $title_matches_query = mysql_query($title_matches_query_string);
          //Copy all db matches into one array
          while(($title_matches[] = mysql_fetch_assoc($title_matches_query)) || array_pop($title_matches)); 
        }

        $description_matches = array();
        foreach($query_terms as $keyword) {
          $description_matches_query_string = "SELECT books.*, categories.name as category_name FROM books LEFT JOIN categories ON books.book_category_id = categories.id WHERE books.book_description LIKE '%$keyword%'";
          $description_matches_query = mysql_query($description_matches_query_string);
          //Copy all db matches into one array
          while(($description_matches[] = mysql_fetch_assoc($description_matches_query)) || array_pop($description_matches)); 
        }

        //Combine matches
        $all_matches[] = array_merge($category_matches, $submitter_matches, $author_matches, $title_matches, $description_matches);
        
        //remove duplicates
        $all_matches_no_dupes = array_pop(super_unique($all_matches));

        
/*  
        echo '<h1>Category:</h1>';
        print_r($category_matches);
        echo '<h1>Submitter:</h1>';
        print_r($submitter_matches);
        echo '<h1>Author:</h1>';
        print_r( $author_matches);
        echo '<h1>Title:</h1>';
        print_r( $title_matches);
        echo '<h1>Description:</h1>';
        print_r($description_matches);*/

        echo "<h1>Search Results</h1>";
        //var_dump($all_matches_no_dupes);
        

    }
 ?>


    <table border="0" width="70%">
    <thead>
        <tr>
            <th>Image</th>
            <th>Book Title</th>
            <th>Author Name</th>
            <th>Price</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>

    <?php foreach($all_matches_no_dupes as $book) { ?>
    <tr>
      <td><a href="details.php?bookid=<?php echo $book['id']; ?>"><img src="pictures/<?php echo $book['book_image']; ?>" alt="<?php $book['book_title']; ?>" width=100 /></a></td>
      <td><a href="details.php?bookid=<?php echo $book['id']; ?>"> <?php echo $book['book_title']; ?></a></td>
      <td><?php echo $book['book_author']; ?></td>
      <td>&nbsp;&pound;<?php echo $book['book_price']; ?></td>
      <td class="small-td"><a href="list.php?catid=<?php echo $book['book_category_id']; ?>"><?php echo $book['category_name']; ?></a></td>
    </tr>
    <?php } ?>

    </tbody>
    </table>

    <p><br class="clearfloat" />
  </p>
  <div id="footer" class="stripe">
    <p align="center">© 2010 BookTrend</p>
  <!-- end #footer --></div></div>
</body>
</html>

