<HTML>
<HEAD><TITLE>EDIT CATEGORY, Page Update</TITLE></HEAD>
<BODY>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());


$update2 = "UPDATE Page_Cat SET page_id = '$page_id' WHERE cat_id = '$cat_id'"; 
$result2 = mysql_query($update2) or die(sql_error());

if(!$result2)
{
	echo "Error, Page/Category Association Failed!";
}
else
{
	echo "Category <h3>$cat_name</h3> Associated With Page <h3>$page_name</h3>";
}

echo "<p><hr><p><a href=\"edit_cat1.php\">Back to Category List</a><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";

?>


</BODY></HTML>
