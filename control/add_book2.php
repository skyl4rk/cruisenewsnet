<HTML>
<HEAD><TITLE>ADD BOOK</TITLE></HEAD>
<BODY>

<?php


echo "<h1>Cruisenews Add Book</h1><hr>\n";

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

/*
$Check_url_query = "SELECT ASIN FROM Books WHERE ASIN = '$ASIN';
$Check_url_result = mysql_query($Check_url_query);


if($Check_url_array = mysql_fetch_row($Check_url_result))
{
echo "$Title $ASIN";
echo "<p>The book you have entered exists in the database.  No data has been added.";
echo "<p><hr><p><a href=\"add_book.php\">Add another Book?</a><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";
die;
}
*/

$Booksquery = "INSERT INTO Books VALUES ('$Category', '$Author', '$Title', '$ASIN', '$Image', '$Rating', curdate(), NULL)";
$Booksinsert = mysql_query($Booksquery) or die(sql_error());
if ($Booksinsert){echo "Books Inserted<br>";}


echo "<table border=\"1\">";
echo "<tr><td align=\"right\">Title:</td><td>$Title</td></tr>\n";
echo "<tr><td align=\"right\">Author:</td><td>$Author</td></tr>\n";
echo "<tr><td align=\"right\">ASIN:</td><td>$ASIN</td></tr>\n";
echo "<tr><td align=\"right\">Category:</td><td>$Category</td></tr>\n";
echo "<tr><td align=\"right\">Image:</td><td>$Image</td></tr>\n";
echo "<tr><td align=\"right\">Rating:</td><td>$Rating</td></tr>\n";
echo "</table>";

echo "<p><a href=\"add_book.php\">Add another Book?</a><p><a href=\"index.html\">Cruisenews Admin Index</a><p>\n";

?>

</BODY></HTML>
