<HTML>
<HEAD><TITLE>EDIT CATEGORY, Name Update</TITLE></HEAD>
<BODY>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());


echo "New Category Name:";
echo "<h3>$cat_name</h3>";

$update = "UPDATE Categories SET cat_name = '$cat_name' WHERE cat_id = '$cat_id'"; 
$result = mysql_query($update) or die(sql_error());

echo "<p><hr><p><a href=\"edit_cat1.php\">Back to Category List</a><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";

?>


</BODY></HTML>
