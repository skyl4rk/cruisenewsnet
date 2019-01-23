<HTML>
<HEAD><TITLE>YACHT CHARTER ADD DESTINATION</TITLE></HEAD>
<BODY>
<h2>Yacht Charter Destination</h2>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

$query = "SELECT name FROM primary.ycdest WHERE name='$name'";
$result = mysql_query($query) or die("Query failed");
if($row = mysql_fetch_row($result))
{
echo "$name exists in the Destination list. No record added.<p>";
}
else
{
$query = "INSERT INTO ycdest VALUES(NULL, '$name', '$text', '$descr', '$key', '$region' )";
$result = mysql_query($query) or die(sql_error());
if($result) {echo "Added: " . $name . " to the list of YC Destinations.";}
}
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

echo "</table>";
echo "<INPUT TYPE = SUBMIT>";
echo "</FORM>";


echo "<p><hr><p><a href=\"yc_add_dest.php\">Add a YC Destination</a><br>";
echo "<a href=\"yc_edit_dest.php\">Edit a YC Destination</a><br>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";
?>


