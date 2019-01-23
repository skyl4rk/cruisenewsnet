<HTML>
<HEAD><TITLE>YACHT CHARTER EDIT REGION</TITLE></HEAD>
<BODY>
<h2>Edit Yacht Charter Region</h2>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());
//if($link_id) {echo "Connected<p>";}

$update = "UPDATE ycregion SET region = '$insert_value' WHERE region = '$edit_line'"; 
$result = mysql_query($update) or die(sql_error());

if($result){echo "Successful edit: " . $edit_line . " to " . $insert_value;}

echo "<p><hr><p>";
echo "Edit a region:<p>";
echo "<FORM METHOD=GET ACTION=\"yc_edit_region.php\">";

echo "<table>";

$query = "SELECT * FROM primary.ycregion";
$result = mysql_query($query) or die("Query failed");

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
