<HTML>
<HEAD><TITLE>YACHT CHARTER ADD DESTINATION</TITLE></HEAD>
<BODY>
<h2>Add a Yacht Charter Destination</h2>
<a href="yc_edit_dest.php">Edit a Destination</a><p>
<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

echo "<FORM METHOD=\"POST\" ACTION=\"yc_add_dest2.php\">\n";
echo "<INPUT NAME=\"name\" TYPE=\"TEXT\" maxlength=255> Destination Name<br>\n";
echo "<INPUT NAME=\"text\" TYPE=\"TEXT\" maxlength=255> Copy Text <br>\n";
echo "<INPUT NAME=\"descr\" TYPE=\"TEXT\" maxlength=255> Page Description<br>\n";
echo "<INPUT NAME=\"key\" TYPE=\"TEXT\" maxlength=255> Keywords<p>\n";

//mysql_select_db("primary") or die("Could not select primary");

$query = "SELECT * FROM primary.ycregion ORDER BY region";
$result = mysql_query($query) or die("Query failed");

$num_rows = mysql_num_rows($result) or die("$query did not return any data");
//print "The query: '$query' returned '$num_rows' rows of data.<p>";

echo "<table>Select a Region:<br>";

while($row = mysql_fetch_row($result))
{
	print "<tr><td><INPUT NAME=\"region\" TYPE=\"Radio\" Value=\"$row[1]\"></td><td> $row[1] </td>";
}

echo "</table>";
echo "<INPUT TYPE = SUBMIT>";

echo "<p>\n";
echo "</FORM>";

echo "<p><hr><p><a href=\"yc_edit_dest.php\">Edit a Destination</a><br>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";
?>

</BODY></HTML>
