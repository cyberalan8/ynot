<?php

$page_file = "viewdonate.php";
$page_title = "View Donate Text";

require ("ext/main_fns.php");
require ("ext/header.php");
require ("ext/custom_text_fns.php");
open_db();

if (!$_SESSION["logged_in"]) {
  loginPrompt($_POST[username],$_POST[remember_me],$_SESSION["error"]);
} else {
/*----- CONTENT ------*/
?>
<div id="cp">
<center><h1>Contests Text</h1>
<p><h3>- - This is what's live on the site* - -</h3>
  <p>
  <p></center>
<?php
viewcustomtext(3);
?>
<p>
  * format maybe slightly different
  <p>
<a href="cp.php"> << Back to Control Panel</a>
</div>

<?php
}
require("ext/footer.php");
?>