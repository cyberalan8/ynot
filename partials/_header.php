<?php

if ($page_file != "logout.php"){
  login_check();
}
#error_reporting( E_ALL);
#ini_set('display_errors', '1 ');

?>
<!DOCTYPE hmtl PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="Content-Language" content="en-us"/>
  <meta name="description" content="YNot Radio" />
  <meta name="keywords" content="Y-Not Radio, ynot radio, y-not, ynot, Y-Not Philly, ynot philly, Y100, Y100 Philadelphia, Y100 Philly, y100 rocks, Philadelphia music, Philly music, indie rock, Josh T. Landow, Josh Landow" />
  <meta name="author" content="YNot Radio" />
  <title><?php if ($page_title) { echo "$page_title | "; } ?> Y-Not Radio </title>
  <link rel="shortcut icon" href="/imgs/favicon.ico" />
  <meta property="og:image"
    content="http://ynotradio.net/imgs/ynot.jpg"/>
  <meta property="og:url"
    content="http://ynotradio.net"/>  
  <meta property="og:title"
      content="YNot Radio"/>
  <meta property="og:description"
      content="YNot Radio | Philadelphia's Real Alternative"/>
  <link href="style/base.css" rel="stylesheet" type="text/css" media="all">
  <script type="text/javascript" src="js/jquery-1.7.1.js"></script>
  <?php require("js/common_functions.js"); ?>

</head>
<div id="fb-root"></div>
<div id="container">
    <header>
          <img src="imgs/header.png" alt="logo" usemap="#Map"/>
          <iframe  src="http://www.live365.com/mini/playlist.html?ads=0&cb=0&site=pro&irows=0&hide=TBW&rows=6&station=ynotradio&css=/scp/css/playlist.css" name="Live365Playlist" scrolling="AUTO" noresize frameborder="No" marginwidth="0" marginheight="0" width=390 height=125></iframe>
  <map name="Map">
    <area shape="rect" coords="15,5,300,150" href="http://www.ynotradio.net" alt="Y-Not Radio"/> 
    <area shape="rect" coords="325,5,430,55" href="http://www.live365.com/cgi-bin/mini.cgi?station_name=ynotradio&amp;site=pro&amp;tm=5300" onclick="return popup(this, &#39;notes&#39;)" alt="Listen Live"/> 
    <area shape="rect" coords="325,65,430,105" href="http://www.live365.com/cgi-bin/play.pls?stationid=ynotradio&tag=itunes"
     alt="iTunes">
    <area shape="rect" coords="325,115,358,145" href="https://www.facebook.com/ynotradio" alt="facebook" target="_new"/>
    <area shape="rect" coords="362,115,394,145" href="http://twitter.com/ynotradio" alt="twitter" target="_new"/>
    <area shape="rect" coords="398,115,432,145" href="mobile.php" alt="mobile"/>
  </map>
  </header>
  <nav>
    <ul>
<?php
$nav = array("index.php" => "Home", "concerts.php" => "Concerts", "top11.php" => "Top 11 @ 11", "music.php" => "New Music", "schedule.php" => "Schedule", "deejays.php" => "Dee Jays", "ondemand.php" => "On Demand", "cdoftheweek.php" => "CD of The Week", "ymail.php" => "Y-Mail", "donate.php" => "Donate");
foreach ($nav as $url => $title) {
  if ($url == $page_file){
    echo "<li><a href=\"/$url\" class=\"active\">$title</a></li>\n";
  }
  else {
    echo "<li><a href=\"/$url\">$title</a></li>\n";
  }
}
?>
    </ul>
  </nav>
<body>