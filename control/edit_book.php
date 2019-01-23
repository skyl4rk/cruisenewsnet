<HTML>
<HEAD><TITLE>EDIT BOOK</TITLE></HEAD>
<BODY>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

$query = "SELECT * FROM Books";
$result = mysql_query($query) or die("Query failed");

$num_rows = mysql_num_rows($result) or die("$query did not return any data");
print "<h2> $num_rows Records in Books</h2><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";
echo "<p><hr><p>";
echo "<h2>Select a record to edit:</h2><p>";
echo "<FORM METHOD=GET ACTION=\"edit_book2.php\">";

echo "<table border=\"1\" cellpadding=\"2\">";

while($row = mysql_fetch_row($result))
{

print "<tr><td><INPUT NAME=\"edit_line\" TYPE=\"Radio\" Value=\"$row[7]\"></td><td> $row[2]</td><td> $row[1]</td><td> $row[3]</td><td> $row[4]</td><td> $row[0]</td>";
}

/*

$row[0] = $Category
$row[1] = $Author 
$row[2] = $Title
$row[3]= $ASIN
$row[4] = $Image
$row[5] = $Rating
$row[6] = $Entry_Date
$row[7]= $ID
*/

echo "</table><p>";
echo "<INPUT TYPE = SUBMIT>";
echo "</FORM>";

echo "<p><hr><a href=\"index.html\">Cruisenews Admin Index</a>";
?>



</BODY></HTML>
