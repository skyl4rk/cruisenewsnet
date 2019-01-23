<HTML>
<HEAD><TITLE>ADD BOOK</TITLE></HEAD>
<BODY>

<?php
echo "<h1>Cruisenews Add Book</h1><hr><p>";

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

echo "<FORM METHOD=\"GET\" ACTION=\"add_book2.php\">\n";
echo "<table>";
echo "<tr><td align=\"right\">Author:</td><td><INPUT NAME=\"Author\" TYPE=\"TEXT\" maxlength=100></td></tr>\n";
echo "<tr><td align=\"right\">Title:</td><td><INPUT NAME=\"Title\" TYPE=\"TEXT\" maxlength=100></td></tr>\n";
echo "<tr><td align=\"right\">ASIN: </td><td><INPUT NAME=\"ASIN\" TYPE=\"TEXT\" maxlength=40></td></tr>\n";
echo "<tr><td align=\"right\">Image:</td><td><INPUT NAME=\"Image\" TYPE=\"TEXT\" maxlength=100></td></tr>\n";
echo "<tr><td align=\"right\">Rating:</td><td><INPUT NAME=\"Rating\" TYPE=\"TEXT\" maxlength=5></td></tr>\n";
echo "<tr><td align=\"right\">Category:</td><td><select NAME=\"Category\">\n";

$cat_query = "SELECT * FROM Book_Cat";
$cat_result = mysql_query($cat_query);
if(!$cat_result) die(sql_error());
while ($cat_data = mysql_fetch_row($cat_result))
{
	echo "<option value=\"";
	echo $cat_data[0];
	echo "\">";
	echo "$cat_data[1]";
	echo "</option>\n";
}
echo "</select></td></tr>\n";



echo "<tr><td></td><td><INPUT TYPE=SUBMIT></td></tr>\n";
echo "</table>";
echo "</FORM><p><hr><p>\n";

echo "<a href=\"add_book.php\">Add another Book</a><p>\n";
echo "<a href=\"index.html\">Cruisenews Admin Index</a><p>\n";

?>

</BODY></HTML>
