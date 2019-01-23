<HTML>
<HEAD><TITLE>ADD URL</TITLE></HEAD>
<BODY>

<?php


echo "<h1>Cruisenews Add URL</h1><hr>\n";

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

$Check_url_query = "SELECT site_url, site_name FROM Sites WHERE site_url = '$site_url' OR site_name='$site_name'";
$Check_url_result = mysql_query($Check_url_query);


if($Check_url_array = mysql_fetch_row($Check_url_result))
{
echo "$site_name $site_url";
echo "<p>The name or url you have entered exists in the database.  No data has been added.";
echo "<p><hr><p><a href=\"add_url.php\">Add another URL?</a><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";
die;
}


$Sitesquery = "INSERT INTO Sites VALUES (Null, '$site_name', '$site_url', '$site_rating', NULL, '$site_atsea', '$site_comment', '$site_searchcomment', curdate())";
$Sitesinsert = mysql_query($Sitesquery) or die(sql_error());
if ($Sitesinsert){echo "Sites Inserted<br>";}

$Siteidquery = "SELECT site_id FROM Sites WHERE site_name = '$site_name'";
$site_id_result = mysql_query($Siteidquery) or die(sql_error());
$site_id_array = mysql_fetch_row($site_id_result) or die(sql_error());

$Areaquery = "INSERT INTO Site_Area VALUES ('$site_id_array[0]', '$site_area')";  
$Areainsert = mysql_query($Areaquery) or die (sql_error());
if ($Areainsert){echo "Area Inserted<br>";}

$Cat_id_query = "SELECT cat_id FROM Categories WHERE cat_name = '$cat_name'";
$Cat_id_result = mysql_query($Cat_id_query) or die(sql_error());
$Cat_id_array = mysql_fetch_row($Cat_id_result) or die(sql_error());

$Cat_name_query = "INSERT INTO Site_Categories VALUES ('$site_id_array[0]', '$Cat_id_array[0]', '$site_rating')"; 
$Cat_name_result = mysql_query($Cat_name_query) or die(sql_error());
if ($Cat_name_result){echo "Category Inserted<br>";}

$Owner_query = "INSERT INTO Site_Owners VALUES ('$site_id_array[0]', '$site_firstname', '$site_lastname')";
$Owner_result = mysql_query($Owner_query) or die(sql_error());
if ($Owner_result){echo "Owner Inserted<p><hr><p>";}

echo "<table border=\"1\">";
echo "<tr><td align=\"right\">Site Name:</td><td>$site_name</td></tr>\n";
echo "<tr><td align=\"right\">Site URL:</td><td>$site_url</td></tr>\n";
echo "<tr><td align=\"right\">Category:</td><td>$cat_name</td></tr>\n";
echo "<tr><td align=\"right\">Area:</td><td>$site_area</td></tr>\n";
echo "<tr><td align=\"right\">Rating:</td><td>$site_rating</td></tr>\n";
echo "<tr><td align=\"right\">Comment:</td><td>$site_comment</td></tr>\n";
echo "<tr><td align=\"right\">Search Comment:</td><td>$site_searchcomment</td></tr>\n";
echo "<tr><td align=\"right\">First Name:</td><td>$site_firstname</td></tr>\n";
echo "<tr><td align=\"right\">Last Name:</td><td>$site_lastname</td></tr>\n";
echo "<tr><td align=\"right\">At Sea?:</td><td>$site_atsea</td></tr>\n";
echo "</table>";

echo "<p><a href=\"edit_record2.php?edit_line=$site_id_array[0]\">Edit this Record</a><br>";
echo "<a href=\"add_url.php\">Add another URL?</a><p><a href=\"index.html\">Cruisenews Admin Index</a><p>\n";

?>

</BODY></HTML>
