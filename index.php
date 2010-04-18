<?php require_once 'webcam_reader.php' ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="google-site-verification" content="1RQ6OhEs1ucjSvlyM3DbSvy5LhewGh01h431I0I4Egk" />
<meta description="Personal site of Charles Mitchell, web developer" />
<meta keywords="web developer, web development, programming, montreal, canada, montreal film night" />

<title>Squall.ca by Charles Mitchell</title>

<script src="http://www.google.com/jsapi?key=ABQIAAAASIifs-jrzJ1RJutsQd5ixBRpiG1VhV31beXX970pgWcqlx5KLhRd7_VofkuuWTlgWbEJ17j7F9QPWA" type="text/javascript"></script>
<script language="Javascript" type="text/javascript">
  google.load("jquery", "1.4.2");
</script>

<link rel="stylesheet" type="text/css" href="/stylesheets/real.css" />
<link rel="stylesheet" type="text/css" href="/stylesheets/ocean.css" />

</head>

<body style="background-color:<?php echo `cat ./tmp/sky_color.txt` ?>;" />
  
  <div id="clouds-left">
    <img src="/images/clouds_left.png" alt="clouds" />
  </div>


  <div id="lighthouse">
    <img src="/tmp/cropped_peggy.jpg" alt="Peggy's cove" />
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
      <p>Charles Mitchell is a web developer living in Montreal Canada.</p>
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
