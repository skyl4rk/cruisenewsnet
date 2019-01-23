<HTML>
<HEAD><TITLE>YACHT CHARTER ADD REGION</TITLE></HEAD>
<BODY>
<h2>Add a Yacht Charter Region</h2>
<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());
//if($link_id) {echo "Connected";}

echo "<FORM METHOD=\"POST\" ACTION=\"yc_add_region2.php\">\n";
echo "Add a region:\n";
echo "<p>\n";
echo "<INPUT NAME=\"ycregion\" TYPE=\"TEXT\" maxlength=255>\n";
echo "<p>\n";
echo "</FORM>";

//mysql_select_db("primary") or die("Could not select primary");

$query = "SELECT * FROM primary.ycregion";
$result = mysql_query($query) or die("Query failed");

$num_rows = mysql_num_rows($result) or die("$query did not return any data");
//print "The query: '$query' returned '$num_rows' rows of data.<p>";

echo "<p><hr><p>";
echo "Edit a YC Region:<p>";
echo "<FORM METHOD=GET ACTION=\"yc_edit_region.php\">";

echo "<table>";

while($row = mysql_fetch_row($result))
{
	print "<tr><td><INPUT NAME=\"edit_line\" TYPE=\"Radio\" Value=\"$row[1]\"></td><td> $row[1] </td>";
}

echo "</table>";
echo "<INPUT TYPE = SUBMIT>";
echo "</FORM>";

echo "<p><hr><p><a href=\"yc_add_region.php\">Add or edit a YC Region?</a><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";
?>



</BODY></HTML>
