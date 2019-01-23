<HTML>
<HEAD><TITLE>YACHT CHARTER EDIT DESTINATION</TITLE></HEAD>
<BODY>
<h2>Edit Yacht Charter Destination</h2>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

// $edit_line is a variable holding the old name of a city passed from previous page

$query = "SELECT * FROM ycdest WHERE name='$edit_line'";
$result = mysql_query($query) or die("Query failed");
$oldrow = mysql_fetch_row($result);

// update

$update = mysql_query("UPDATE ycdest SET text='$text', descr='$descr', keyw='$keyw', region='$region', name='$name' WHERE name='$edit_line'");

// this section shows the new and old database records after the update to confirm if it worked

$query = "SELECT * FROM ycdest WHERE name='$name'";
$result = mysql_query($query) or die("Query failed");

while($row = mysql_fetch_row($result))
{
	print "<table>\n";
	print "<tr><td>New Records</td><td>Old Records</td></tr>\n";
	print "<tr><td>$row[0]</td><td>$oldrow[0]</td></tr>\n";
	print "<tr><td>$row[1]</td><td>$oldrow[1]</td></tr>\n";
	print "<tr><td>$row[2]</td><td>$oldrow[2]</td></tr>\n";
	print "<tr><td>$row[3]</td><td>$oldrow[3]</td></tr>\n";
	print "<tr><td>$row[4]</td><td>$oldrow[4]</td></tr>\n";
	print "<tr><td>$row[5]</td><td>$oldrow[5]</td></tr>\n";
	print "</table><p>\n";
}
echo "<p>\n<hr><p>\n";
echo "<a href=\"http://www.cruisenews.net/control/yc_edit_dest2.php?edit_line=$name\">Edit this record</a><br>\n";
echo "<a href=\"yc_add_dest.php\">Add or edit another YC Destination?</a><br>\n";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>\n";

?>
</BODY>
</HTML>
