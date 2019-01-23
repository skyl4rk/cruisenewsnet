<HTML>
<HEAD><TITLE>EDIT BOOK</TITLE></HEAD>
<BODY>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());
echo "<h2>Edit Site Info</h2>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a><p><hr>";


$query = "SELECT * FROM Books WHERE ID = $edit_line";
$result = mysql_query($query) or die("Query failed");
$row = mysql_fetch_row($result);


/*

$row[0] = $Category
$row[1] = $Author 
$row[2] = $Title
$row[3]= $ASIN
$row[4] = $Image
$row[5] = $Rating
$row[7] = $Entry_Date
$row[8]= $ID

*/

echo "<FORM METHOD=POST ACTION=\"edit_book3.php\">";
echo "<table border = \"1\">";

echo "<INPUT TYPE=HIDDEN NAME=Book_ID VALUE= \"$edit_line\"></td></tr>";

echo "<tr><td>Title: </td><td><INPUT NAME=Title TYPE=\"TEXT\" VALUE= \"$row[2]\">";

echo "<tr><td>Author: </td><td><INPUT NAME=Author TYPE=\"TEXT\" VALUE= \"$row[1]\">";

echo "<tr><td>ASIN: </td><td><INPUT NAME=ASIN TYPE=\"TEXT\" VALUE= \"$row[3]\">";

echo "<tr><td>Image: </td><td><INPUT NAME=Image TYPE=\"TEXT\" VALUE= \"$row[4]\">";

echo "<tr><td>Rating: </td><td><INPUT NAME=Rating TYPE=\"TEXT\" VALUE= \"$row[5]\">";

echo "<tr><td>Category: </td><td><INPUT NAME=Category TYPE=\"TEXT\" VALUE= \"$row[0]\">";


echo "</table><p>";

echo "<INPUT TYPE=\"SUBMIT\"></FORM>";

echo "<p><hr><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";



?>

</BODY></HTML>
