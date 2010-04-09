<?php 



  function getSkyColor() {
    $ave=`convert tmp/sky.jpg -filter box -resize 1x1! -format "%[pixel:u]" info:`;

    echo $ave;
    

  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="google-site-verification" content="1RQ6OhEs1ucjSvlyM3DbSvy5LhewGh01h431I0I4Egk" />

<title>Squall.ca by Charles Mitchell</title>

<link rel="stylesheet" type="text/css" href="/stylesheets/real.css" />
<link rel="stylesheet" type="text/css" href="/stylesheets/ocean.css" />

</head>

<body style="background-color:<?php getSkyColor(); ?>;" />
  
  <div id="clouds-left">
    <img src="/images/clouds_left.png" alt="clouds" />
  </div>


  <div id="lighthouse">
    <img src="webcam_reader.php" alt="Peggy's cove" />
  </div>

  <div id="clouds-right">
    <img src="/images/clouds_right.png" alt="clouds" />
  </div>

<!--
  <div id="sky-patch">
    <img src="tmp/sky.jpg" alt="sky" />
  </div>
-->

  <div id="main" >
    <div id="main-intro">
        <h1>Squall.ca by Charles Mitchell</h1>
        
        <p>You've arrived on my landing page, How can I help?</p>
        
        <ul>
            <li>Figure out if you want to <a href="http://clients.squall.ca" title="Hire me for web development today!">hire me!</a></li>
            <li>Read <a href="/blog">my Writing</a></li>
            <li>See what <a href="/feeds" title="RSS Feeds">I read online</a>.</li>
            <li>Find out about <a href="http://movies.squall.ca" title="Movies @ the loft on Casgrain">Movie Night @ Our studio!</a></li>
            <li>Play some <a href="games.html" title="games">games</a>.</li>
            <li>Watch some <a href="video.html" title="online videos">online videos</a>.</li>
                
        </ul>


    </div>
    <div id="main-context">
      <p>Squall.ca is a personal project to let Charles play around with stuff on the web.<br />
         If you have any comments or suggestions, please drop me a line at <a href="mailto:chuckmitchell@gmail.com">chuckmitchell@gmail.com</a>        </p>
    </div>
    <div id="copyright">
      <p>2009 &copy; Charles Mitchell</p>
    </div>
  </div>
  
  
  <?php include("_google_analytics.html") ?>

</body>



</html>
