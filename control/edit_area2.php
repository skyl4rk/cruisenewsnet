<HTML>
<HEAD></HEAD>
<BODY>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());
if($link_id) {echo "Connected<p>";}

$update = "UPDATE Site_Arealist SET site_arealist = '$insert_value' WHERE site_arealist = '$edit_line'"; 
$result = mysql_query($update) or die(sql_error());

if($result){echo "Successful Edit.";}
echo "<p><hr><p><a href=\"add_area.php\">Add or edit an area?</a><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";

?>


</BODY></HTML>
