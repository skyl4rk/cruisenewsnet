<HTML>
<HEAD><TITLE>YACHT CHARTER EDIT DESTINATION</TITLE></HEAD>
<BODY>
<h2>Edit Yacht Charter Destination</h2>
<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());
//if($link_id) {echo "Connected<p>";}

echo "<p><hr><p>";
echo "Edit a Destination:<p>\n";

$query = "SELECT * FROM primary.ycdest";
$result = mysql_query("SELECT * FROM ycdest WHERE name='$edit_line'") or die(sql_error());

while($row = mysql_fetch_row($result))
{
echo "<FORM METHOD=POST ACTION=\"yc_edit_dest3.php\">\n";

echo "<INPUT NAME=\"name\" TYPE=\"TEXT\" SIZE=40 VALUE='$row[1]'> Name<br>\n";
echo "<TEXTAREA NAME=\"text\" ROWS=3 COLS=58>" . $row[2] . "</TEXTAREA> Copy Text <br>\n";
echo "<TEXTAREA NAME=\"descr\" ROWS=2 COLS=58>" . $row[3] . "</TEXTAREA> Page Description<br>\n";
echo "<TEXTAREA NAME=\"keyw\" ROWS=2 COLS=58>" . $row[4] . "</TEXTAREA> Keywords<p>\n";
echo "<INPUT TYPE=HIDDEN NAME=\"edit_line\" VALUE='$edit_line'>";

$query2 = "SELECT * FROM primary.ycregion";
$result2 = mysql_query($query2) or die("Query failed");

$num_rows2 = mysql_num_rows($result2) or die("$query2 did not return any data");

echo "<table>\n";

while($row2 = mysql_fetch_row($result2))
{
	print "<tr><td><INPUT NAME=\"region\" TYPE=\"Radio\" Value=\"$row2[1]\"";
	if ($row2[1] == $row[5]) {echo " checked";}
	print "></td><td> $row2[1] </td>\n";
}

echo "</table><P>";


echo "<INPUT TYPE=\"SUBMIT\"></FORM>\n";
}

echo "<p>\n<hr><p><a href=\"yc_add_dest.php\">Add or edit another YC Destination?</a><p>\n";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>\n";

?>
</BODY>
</HTML>
