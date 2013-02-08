<?php

function add_ad($name, $start_date, $end_date, $pic_url, $web_url) {
  $name = mysql_real_escape_string($name);
  $pic_url = mysql_real_escape_string($pic_url);
  $web_url = mysql_real_escape_string($web_url);

  $insert = "INSERT INTO ads VALUES (id, '".$name ."', '".$start_date. "', '". $end_date ."', '". $pic_url ."', '". $web_url ."', 'n')";

  $result = mysql_query($insert);

  if (!$result) {
    echo $insert ."<br>";
    die('Error Inserting into Database.');
  }

  echo "<div class=\"center\"><h1>Success!</h1>".
       "<h3>New Ad for ". $name. " has been saved</h3>".
       "<hr width=75%>";
  display_ad(get_ad(mysql_insert_id()));
  echo "</div>";
}

function delete_ad($id){
  $update = "UPDATE ads set deleted ='y' where id=".$id;
  $result = mysql_query($update);

  if (!$result) {
    echo "'Error deleting the ad from the database: ". $update ."<br>";
  } else {
    $ad = get_ad($id);
    echo "<div class=\"center\"><h1>Success!</h1>".
    "<h3>The ad for <span class=\"success\">". $ad['name'] ."</span> has been deleted.</h3></div>";
  }
}

function display_ad($ad) {
    echo "<b>Name:</b> ". $ad['name'].
    "<br><b>Start Date:</b> ". $ad['start_date'].
    "<br><b>End Date:</b> ". $ad['end_date'].
    "<br><b>Picture:</b><br> ".
    "<img src='". $ad['pic_url']. "' width='200px'>".
    "<br><b>Link:</b> ". $ad['web_url'];
}

function get_ad($id) {
  $query = "SELECT * FROM ads where id=".$id;
  $result = mysql_query($query);

  if (!$result)
    echo 'No results in database.';
  else
    return mysql_fetch_assoc($result);
}

function show_ads(){
  $query = "SELECT * FROM ads WHERE deleted = 'n' AND start_date <= now() AND end_date >= now() ORDER BY end_date";
  $result = mysql_query($query);

  if (!$result) {
    echo "error: ". $query;
    die('Invalid');
  }
  if (mysql_num_rows($result) > 0)
    echo "<div class=\"ads\">";

  for ($i=1; $i<=mysql_num_rows($result);$i++)
  {
    $info = mysql_fetch_assoc($result);
    echo "<a href=\"".$info['web_url']."\" target='_blank'><img src=\"".$info['pic_url']."\"></a>";
  }

  if (mysql_num_rows($result) > 0)
    echo "</div>";
}

function update_ad($id, $name, $start_date, $end_date, $pic_url, $web_url) {
  $id = mysql_real_escape_string($id);
  $start_date = mysql_real_escape_string($start_date);
  $end_date = mysql_real_escape_string($end_date);
  $name = mysql_real_escape_string($name);
  $pic_url = mysql_real_escape_string($pic_url);
  $web_url = mysql_real_escape_string($web_url);

  $update = "UPDATE ads SET start_date=\"$start_date\", end_date=\"$end_date\", name=\"$name\", pic_url=\"$pic_url\", web_url=\"$web_url\" WHERE id=".$id;
  $result = mysql_query($update);

  if (!$result)
    echo "There was an error updating: <br>" . $update;
  else
    return $result;
}

function view_all_active_ads(){
  $query = "SELECT * FROM ads WHERE deleted = 'n' AND end_date >= now() ORDER BY end_date";
  $result = mysql_query($query);

  if (!$result) {
    echo "error: ". $query;
    die('Invalid');
  }

  echo '<ol>';
  for ($i=1; $i<=mysql_num_rows($result);$i++)
  {
    $info = mysql_fetch_assoc($result);
    display_ad($info);
      echo '<br>[ <a href="ad_update.php?id=' .$info[id]. '">Edit</a> | <a href="ad_delete.php?id=' .$info[id]. '">Delete</a> ] <p>';
  }
  echo '</ol>';
}

?>
