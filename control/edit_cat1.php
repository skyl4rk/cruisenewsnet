<HTML>
<HEAD><TITLE>EDIT CATEGORY, Select Category</TITLE></HEAD>
<BODY>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

$query = "SELECT * FROM primary.Categories";
$result = mysql_query($query) or die(sql_error());

$num_rows = mysql_num_rows($result) or die(sql_error());
echo "<h2>Edit Category</h2>$num_rows Categories Returned.<p>";

echo "<p><hr><p>";
echo "Select a Category to Edit:<p>";
echo "<FORM METHOD=GET ACTION=\"edit_cat2.php\">";

echo "<table border = \"1\"><tr><td></td><td></td><th align=\"left\">Category</th><th align = \"left\">Page</th>\n";

while($row = mysql_fetch_row($result))
{
	$query2 = "SELECT page_name FROM Pages, Page_Cat WHERE Pages.page_id = Page_Cat.page_id AND cat_id = '$row[0]'";
	if($result2 = mysql_query($query2) or die(sql_error()))
	{
		$row2 = mysql_fetch_row($result2);
		echo "<tr><td><INPUT NAME=\"cat_id\" TYPE=\"Radio\" Value=\"$row[0]\"></td><td> $row[0] </td><td> $row[1] </td><td>$row2[0]</td></tr>";
	}
	else
	{
	print "<tr><td><INPUT NAME=\"cat_id\" TYPE=\"Radio\" Value=\"$row[0]\"></td><td> $row[0] </td><td> $row[1] </td></tr>\n";
	}
}

echo "</table><p>\n";
echo "<INPUT TYPE = SUBMIT>";
echo "</FORM>";

echo "<p><hr><p><a href=\"edit_cat1.php\">Add or edit a category</a><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";
?>



</BODY></HTML>