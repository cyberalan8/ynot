<?php

$page_file = "madness.php";
$page_title = "Modern Rock Madness";

require ("functions/main_fns.php");
require ("functions/mrm_fns.php");
require ("partials/_header.php");

$current_match = now_match();

$match_id = $_POST['match_id'];
$band_id = $_POST['band_id'];

/*----- CONTENT ------*/
?>

<div class="row">
  <div class="twelve columns">
    <div id="mrm_text">
      <a href="madness.php"><img src="images/mrm_banner2013.png" alt="Modern Rock Madness 2013" width="800px"></a>
  Download your Modern Rock Madness 2013 brackets <a href="http://ynotradio.opendrive.com/files/68533726_CRA47_00e2/YNot_MRM2013_Brackets.pdf">here</a> and listen all week as Y-Not bands go head to head! Help your favorites advance to the next round by voting here, or if you're listening on the go, you can text your votes in to 267-293-YNOT.  Plus get more color commentary on each day's matches by visiting our partner site <a href="http://www.tristateindie.com" target="_new">Tri State Indie</a>.
      <div class="social">
        <a href="https://twitter.com/share" class="twitter-share-button" data-text="Check out @YNotRadio's Modern Rock Madness - 64 bands go head to head www.ynotradio.net/madness #YNotMadness" data-count="none" data-via="YNotRadio">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
        <div class="fb-like" data-href="http://www.ynotradio.net/madness.php" data-send="true" data-width="450" data-show-faces="false"></div>
      </div>
    </div>
<?php

if ($band_id && $match_id)
  vote($match_id, $band_id, false);

show_match($current_match['id']);
display_first_row();
display_bracket();
?>

  </div>
</div>
<?php require ("partials/_footer.php"); ?>
