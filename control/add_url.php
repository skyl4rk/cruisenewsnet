<HTML>
<HEAD><TITLE>ADD URL</TITLE></HEAD>
<BODY>

<?php
echo "<h1>Cruisenews Add URL</h1><hr><p>";

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

echo "<FORM METHOD=\"GET\" ACTION=\"add_url2.php\">\n";
echo "<table>";
echo "<tr><td align=\"right\">Site Name: </td><td><INPUT NAME=\"site_name\" TYPE=\"TEXT\" maxlength=80></td></tr>\n";
echo "<tr><td align=\"right\">Site URL:</td><td><INPUT NAME=\"site_url\" TYPE=\"TEXT\" maxlength=255></td></tr>\n";
echo "<tr><td align=\"right\">Category:</td><td><select NAME=\"cat_name\">\n";

$cat_query = "SELECT cat_name FROM Categories";
$cat_result = mysql_query($cat_query);
if(!$cat_result) die(sql_error());
while ($cat_data = mysql_fetch_row($cat_result))
{
	echo "<option value=\"";
	echo $cat_data[0];
	echo "\">";
	echo "$cat_data[0]";
	echo "</option>\n";
}
echo "</select></td></tr>\n";

echo "<tr><td align=\"right\">Area:</td><td><select NAME=\"site_area\">\n";
$area_query = "SELECT site_arealist FROM Site_Arealist";
$area_result = mysql_query($area_query);
if(!$area_result) die(sql_error());
while ($area_data = mysql_fetch_row($area_result))
{
	echo "<option value=\"";
	echo $area_data[0];
	echo "\">";
	echo "$area_data[0]";
	echo "</option>\n";
}
echo "</select></td></tr>\n";

echo "<tr><td align=\"right\">Site Rating</td><td><select NAME=\"site_rating\">\n";
echo "<option>1</option>\n";
echo "<option>2</option>\n";
echo "<option>3</option>\n";
echo "<option>4</option>\n";
echo "<option>5</option>\n";
echo "<option>6</option>\n";
echo "<option>7</option>\n";
echo "<option>8</option>\n";
echo "<option>9</option>\n";
echo "<option>10</option>\n";
echo "</select></td></tr>\n";

echo "<tr><td align=\"right\">Currently at sea:</td><td><SELECT NAME=\"site_atsea\" >\n";
echo "<option>FALSE</option>\n";
echo "<option>TRUE</option>\n";
echo "</select></td></tr>\n";

echo "<tr><td align=\"right\">Displayed Comments:</td><td><INPUT NAME=\"site_comment\" TYPE=\"TEXT\" maxlength=255></td></tr>\n";

echo "<tr><td align=\"right\">Search Comments:</td><td><INPUT NAME=\"site_searchcomment\" TYPE=\"TEXT\" maxlength=255></td></tr>\n";

echo "<tr><td align=\"right\">Owner First, Last Name:</td><td><INPUT NAME=\"site_firstname\" TYPE=\"TEXT\" maxlength=80>\n";
echo "<INPUT NAME=\"site_lastname\" TYPE=\"TEXT\" maxlength=80></td></tr>\n";

echo "<tr><td></td><td><INPUT TYPE=SUBMIT></td></tr>\n";
echo "</table>";
echo "</FORM><p><hr><p>\n";

echo "<a href=\"add_url.php\">Add another URL?</a><p>\n";
echo "<a href=\"index.html\">Cruisenews Admin Index</a><p>\n";

?>

</BODY></HTML>