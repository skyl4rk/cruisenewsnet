<HTML>
<HEAD><TITLE>EDIT CATEGORY, Data Entry</TITLE></HEAD>
<BODY>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

$query = "SELECT cat_name FROM Categories WHERE cat_id ='$cat_id'";
$result = mysql_query("$query") or die(sql_error());
$row = mysql_fetch_row($result);
$cat_name = "$row[0]";

echo "<h2>Edit Category Name</h2>";
echo "Current Name:<br><h3>$row[0]</h3> ";

echo "<br>New Name: ";
echo "<FORM METHOD=POST ACTION=\"edit_cat3.php\">";
echo "<INPUT NAME=cat_name TYPE=\"TEXT\">";
echo "<INPUT TYPE=HIDDEN NAME=cat_id VALUE='$cat_id'>";
echo "<INPUT TYPE=\"SUBMIT\"></FORM>";

$query2 = "SELECT Pages.page_name, Pages.page_id, Page_Cat.page_id FROM Pages, Page_Cat WHERE Page_Cat.cat_id = '$cat_id' AND Pages.page_id = Page_Cat.page_id";
$result2 = mysql_query("$query2") or die(sql_error());
$row2 = mysql_fetch_row($result2);
$page_name = $row2[0];

echo "<hr><h2>Change Page Association</h2>\n";
echo "<p>Current Page:<br><h3>$page_name</h3>\n";

echo "<br>Place This Category in Page:<br>\n";
echo "<FORM METHOD=POST ACTION=\"edit_cat4.php\">";
echo "<SELECT NAME=\"page_id\">\n";

$page_query = "SELECT page_id, page_name FROM Pages";
$page_result = mysql_query($page_query);
if(!$page_result) die(sql_error());
while ($page_data = mysql_fetch_row($page_result))
{
	echo "<option value=\"";
	echo $page_data[0];
	echo "\">";
	echo "$page_data[1]";
	echo "</option>\n";
}
echo "</select></td></tr>\n";

echo "<INPUT TYPE=HIDDEN NAME=cat_id VALUE='$cat_id'>";
echo "<INPUT TYPE=HIDDEN NAME=page_name VALUE='$page_name'>";
echo "<INPUT TYPE=HIDDEN NAME=cat_name VALUE='$cat_name'>";
echo "<INPUT TYPE=\"SUBMIT\"></FORM>";

echo "<p><hr><p><a href=\"edit_cat1.php\">Back to Category List</a><p>";

echo "<a href=\"index.html\">Cruisenews Admin Index</a>";

?>

</BODY></HTML>
