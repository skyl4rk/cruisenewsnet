<HTML>
<HEAD><TITLE>ADD CATEGORY</TITLE></HEAD>
<BODY>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());
if($link_id) {echo "Connected";}

echo "<FORM METHOD=\"POST\" ACTION=\"add_cat2.php\">\n";
echo "Add a category:\n";
echo "<br>\n";
echo "<INPUT NAME=\"cat_name\" TYPE=\"TEXT\" maxlength=255>\n";
echo "<p>\n";
echo "</FORM>";

//mysql_select_db("primary") or die("Could not select primary");

$query = "SELECT * FROM primary.Categories";
$result = mysql_query($query) or die(sql_error());

$num_rows = mysql_num_rows($result) or die(sql_error());
print "The query: '$query' returned '$num_rows' Categories.<p>";

echo "<p><hr><p>";
echo "Edit an entry:<p>";
echo "<FORM METHOD=GET ACTION=\"edit_cat.php\">";

echo "<table>";

while($row = mysql_fetch_row($result))
{
	print "<tr><td><INPUT NAME=\"edit_line\" TYPE=\"Radio\" Value=\"$row[1]\"></td><td> $row[0] </td><td> $row[1] </td>";
}

echo "</table>";
echo "<INPUT TYPE = SUBMIT>";
echo "</FORM>";

echo "<p><hr><p><a href=\"add_cat.php\">Add or edit a category</a><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";
?>



</BODY></HTML>