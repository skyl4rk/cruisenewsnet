<HTML>
<HEAD><TITLE>SEARCH RESULTS</TITLE></HEAD>
<BODY>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

echo "The search for $search_term resulted in:<p>";

$query = "SELECT site_name, site_url, site_comment, site_id FROM Sites WHERE site_name LIKE '%$search_term%' OR site_comment LIKE '%$search_term%' OR site_searchcomment LIKE '%$search_term%' OR Site_Owners.site_firstname LIKE '%$search_term%' OR Site_Owners.site_lastname LIKE '%$search_term%'";

$result = mysql_query($query) or die("No match found in first select.");
echo "<table>";
while($row = mysql_fetch_row($result))
{

echo "<tr><td><a target=\"_blank\"  href=\"$row[1]\"><h3>$row[0]</h3></a><td>$row[2]</tr>";

}
////////////////////////////
$query = "SELECT site_id, site_firstname, site_lastname FROM Site_Owners WHERE site_firstname LIKE '%$search_term%' OR site_lasname LIKE '%$search_term%'";
$result2 = mysql_query($query) or die("No match found.");

while($row = mysql_fetch_row($result2))
{
	$site_nameid = $row[0];
	$query = "SELECT site_name, site_url, site_comment, site_id FROM Sites WHERE site_id = '$sitename_id'";
	$result3 = mysql_query($query) or die("No match found.");

	while($row = mysql_fetch_row($result))
	{

	echo "<tr><td><a target=\"_blank\"  href=\"$row[1]\"><h3>$row[0]</h3></a><td>$row[2]</tr>";

	}


}

////////////////////////////
echo "</table>";

echo "<p><hr><p><a href=\"search.php\">New Search?</a><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";

?>

</BODY></HTML>