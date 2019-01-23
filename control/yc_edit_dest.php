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
echo "$name <p>";


echo "<p><hr><p>";
echo "Edit a Destination:<p>";
echo "<FORM METHOD=GET ACTION=\"yc_edit_dest2.php\">";

echo "<table>";

$query = "SELECT name FROM primary.ycdest ORDER BY name";
$result = mysql_query($query) or die("Query failed");

while($row = mysql_fetch_row($result))
{
	print "<tr><td><INPUT NAME=\"edit_line\" TYPE=\"Radio\" Value=\"$row[0]\"></td><td> $row[0] </td>";
}

echo "</table><p>";
echo "<INPUT TYPE = SUBMIT>";
echo "</FORM>";

echo "<p><hr><p><a href=\"yc_add_dest.php\">Add or edit another YC Destination?</a><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";

?>

</BODY></HTML>
