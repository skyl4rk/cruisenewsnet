<HTML>
<HEAD><TITLE>EDIT BOOK</TITLE></HEAD>
<BODY>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());
echo "<h2>Book Edit Results</h2><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a><hr>";
echo "<a href=\"edit_book.php\">Edit Another Book</a>";

$update1 = "UPDATE Books SET Title = '$Title' WHERE ID = '$Book_ID'";
$result1 = mysql_query($update1) or die(sql_error());

$update2 = "UPDATE Books SET Author = '$Author' WHERE ID = '$Book_ID'";
$result22 = mysql_query($update2) or die(sql_error());

$update3 = "UPDATE Books SET ASIN = '$ASIN' WHERE ID = '$Book_ID'";
$result3 = mysql_query($update3) or die(sql_error());

$update4 = "UPDATE Books SET Image = '$Image' WHERE ID = '$Book_ID'";
$result = mysql_query($update4) or die(sql_error());

$update5 = "UPDATE Books SET Rating = '$Rating' WHERE ID = '$Book_ID'";
$result = mysql_query($update5) or die(sql_error());

$update6 = "UPDATE Books SET Category = '$Category' WHERE ID = '$Book_ID'";
$result = mysql_query($update6) or die(sql_error());


print "<h2>Updated the Following Record:</h2><table border=\"1\">
<tr><td>Title:</td><td>$Title 
<tr><td>Author:</td><td>$Author 
<tr><td>ASIN:</td><td>$ASIN 
<tr><td>Image</td><td>$Image
<tr><td>Rating</td><td>$Rating 
<tr><td>Category:</td><td>$Category 
<tr><td>Book ID:</td><td>$Book_ID 
</table><p>";

echo "<a href=\"edit_book2.php?edit_line=$Book_ID\">Edit this Record</a>";
echo "<p><hr><p>";
echo "<a href=\"update.php\">Update Static HTML</a>";
echo "<p><hr><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";


?>


</BODY></HTML>
