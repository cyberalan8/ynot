<?php

function add_year_end_staff_pick($order, $html) {
  $order = mysql_real_escape_string($order);

  $insert = "INSERT INTO year_end_staff_picks VALUES (id, '".$order ."', '".$html."', 'n')";
  $result = mysql_query($insert);

  if (!$result) {
    echo $insert ."<br>";
    die('Error Inserting into Database.');
  }

  echo "<div class=\"center\"><h1>Success!</h1>".
       "<h3>New Year End Staff Pick has been saved</h3>".
       "<hr width=75%>";
        display_year_end_staff_pick(get_year_end_staff_pick(mysql_insert_id()));
  echo "</div>";
}

function delete_year_end_staff_pick($id){
  $update = "UPDATE year_end_staff_picks set deleted ='y' where id=".$id;
  $result = mysql_query($update);

  if (!$result) {
    echo "'Error deleting the ad from the database: ". $update ."<br>";
  } else {
    echo "<div class=\"center\"><h1>Success!</h1>".
    "<h3>The Year End Staff Pick has been deleted.</h3></div>";
  }
}

function display_year_end_staff_pick($year_end_staff_pick) {
  echo "<b>Order:</b> ". $year_end_staff_pick['order_id'] .
    "<br><b>HTML:</b> ". $year_end_staff_pick['html'];
}

function get_year_end_staff_pick($id) {
  $query = "SELECT * FROM year_end_staff_picks WHERE deleted = 'n' AND id=".$id." ORDER BY order_id";
  $result = mysql_query($query);

  if (!$result)
    echo 'No results in database.';
  else
    return mysql_fetch_assoc($result);
}

function get_year_end_staff_pick_count() {
  $query = "SELECT * FROM year_end_staff_picks WHERE deleted = 'n' ORDER BY order_id DESC LIMIT 1";
  $result = mysql_query($query);

  if (!$result) {
    echo "error: ". $query;
    die('Invalid');
  }

  $info = mysql_fetch_assoc($result);
  return $info['order_id'];
}

function show_year_end_staff_picks() {
  $query = "SELECT * FROM year_end_staff_picks WHERE deleted = 'n' ORDER BY order_id";
  $result = mysql_query($query);

  if (!$result) {
    echo "error: ". $query;
    die('Invalid');
  }

  for ($i=1; $i<=mysql_num_rows($result);$i++) {
    $info = mysql_fetch_assoc($result);
    echo $info['html'] . "<br>";
  }
}

function update_year_end_staff_picks($id, $order, $html) {
  $order = mysql_real_escape_string($order);
  $html = mysql_real_escape_string($html);

  $update = "UPDATE year_end_staff_picks SET order_id=\"$order\", html=\"".$html."\" WHERE id=".$id;
  $result = mysql_query($update);

  if (!$result)
    echo "There was an error updating: <br>" . $update;
  else
    return $result;
}

function view_all_year_end_staff_picks() {
  $query = "SELECT * FROM year_end_staff_picks WHERE deleted = 'n' ORDER BY order_id";
  $result = mysql_query($query);

  if (!$result) {
    echo "error: ". $query;
    die('Invalid');
  }

  echo '<ol>';
  for ($i=1; $i<=mysql_num_rows($result);$i++)
  {
    $info = mysql_fetch_assoc($result);
    display_year_end_staff_pick($info);
    echo '[ <a href="year_end_staff_picks_update.php?id=' .$info[id]. '">Edit</a> | <a href="year_end_staff_picks_delete.php?id=' .$info[id]. '">Delete</a> ] <p>';
  }
  echo '</ol>';
}
?>
