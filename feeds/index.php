<?php //require_once('../lib/magpie/rss_fetch.inc');
      //$url = "http://www.google.com/reader/public/atom/user%2F05206281886015490759%2Fstate%2Fcom.google%2Fbroadcast";
      //$rss = fetch_rss($url); 

	require_once('../lib/rss_fetch.inc');
	$url = $_GET['http://www.google.com/reader/public/atom/user%2F05206281886015490759%2Fstate%2Fcom.google%2Fbroadcast'];
	$rss = fetch_rss( $url );


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Things that Charles Mitchell has read recently</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />
</head>

<body>

     <p>I use <a href="http://www.google.com/reader">Google Reader</a>, and share the stuff that I want people to think I'm interested in ;)</p>

     
	<?php
	  echo "Channel Title: " . $rss->channel['title'] . "<p>";
	  echo "<ul>";
	  foreach ($rss->items as $item) {
		  $href = $item['link'];
		  $title = $item['title'];
		  echo "<li><a href=$href>$title</a></li>";
	  }
	  echo "</ul>";
	?>

</body>
</html>