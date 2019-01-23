<HTML>
<HEAD><TITLE>ADD AREA</TITLE></HEAD>
<BODY>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());
if($link_id) {echo "Connected";}



echo "<FORM METHOD=\"POST\" ACTION=\"add_area2.php\">\n";
echo "Add an area:\n";
echo "<br>\n";
echo "<INPUT NAME=\"site_arealist\" TYPE=\"TEXT\" maxlength=255>\n";
echo "<p>\n";
echo "</FORM>";

//mysql_select_db("primary") or die("Could not select primary");

$query = "SELECT * FROM primary.Site_Arealist";
$result = mysql_query($query) or die("Query failed");

$num_rows = mysql_num_rows($result) or die("$query did not return any data");
print "The query: '$query' returned '$num_rows' rows of data.<p>";

echo "<p><hr><p>";
echo "Edit an entry:<p>";
echo "<FORM METHOD=GET ACTION=\"edit_area.php\">";

echo "<table>";

while($row = mysql_fetch_row($result))
{
	print "<tr><td><INPUT NAME=\"edit_line\" TYPE=\"Radio\" Value=\"$row[0]\"></td><td> $row[0] </td>";
}

echo "</table>";
echo "<INPUT TYPE = SUBMIT>";
echo "</FORM>";

echo "<p><hr><p><a href=\"add_area.php\">Add or edit an area?</a><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";
?>



</BODY></HTML>