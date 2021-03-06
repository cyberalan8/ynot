<?php
  $top11picks = $_POST['top11'];
  $write_in_value = $_POST['write_in_value'];

  $limit = 3;
  if ($write_in_value)
    $limit = $limit - 1;

  if(empty($top11picks)) {
    echo("<div class=\"center error\">You didn't select any songs, please <a href='top11.php'>go back</a> and try again.</div>");
  } elseif (count($top11picks) > $limit) {
    echo("<div class=\"center error\">You selected more than 3 songs, please <a href='top11.php'>go back</a> and select only 3 songs.</div>");
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
    //$ip = rand(0, 1000000);
    if ($by_pass_ip_check || check_ip($ip)) {
      $count = count($top11picks);	
      for($i=0; $i < $count; $i++)
      {
        add_top11_plus1($top11picks[$i]);
      }

      $firstname = mysql_real_escape_string($_POST['firstname']);
      $lastname = mysql_real_escape_string($_POST['lastname']);
      $email = mysql_real_escape_string($_POST['email']);
      $phone = mysql_real_escape_string($_POST['phone']);
      $write_in_value = mysql_real_escape_string($_POST['write_in_value']);
      $contest = $_POST['contest'];
      $newsletter = $_POST['newsletter'];

      if ($write_in_value) {
        write_in($write_in_value);
      }

      if ($contest == "yes" && ($email || $phone)) {
        add_contestant($firstname, $lastname, $email, $phone, $contest, $newsletter);
        echo "<div class=\"center success\">We have received your entry and song selections, thanks!</div>";
      } else {
        echo "<div class=\"center success\">We have received your song entries, thanks!</div>";
      }

      if ($contest == "no" && $newsletter == 'yes' && ($email || $phone)) {
        add_contestant($firstname, $lastname, $email, $phone, $contest, $newsletter);
      }
    } // end if check_ip
    else {
      echo "<div class=\"center error\">Our records show that you have already voted this week.\n<br>\nIf you feel this is a mistake, please contact <a href=\"mailto:josh@ynotradio.net?Subject=Top11%20Voting%20Error\">Josh T. Landow.</a></div>";
    }
  }
?>
