<HTML>
<HEAD><TITLE>SEARCH RESULTS</TITLE></HEAD>
<BODY>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

echo "<h2>Searching Cruisenews.net for \"$search_term\"</h2><p>";

echo "<h2>Select a record to edit:</h2><p>";
echo "<FORM METHOD=GET ACTION=\"edit_record2.php\">";

echo "<table bgcolor=\"white\" border=0 width=\"90%\" align=\"center\">";

// SEARCH Sites ///////////////

echo "<tr><td colspan = \"3\"> <hr><p></tr><tr><th align=\"left\">Searching Sites:</tr>";

$query = "SELECT site_name, site_url, site_comment, site_id FROM Sites WHERE site_name LIKE '%$search_term%' OR site_comment LIKE '%$search_term%' OR site_url LIKE '%$search_term%' OR site_searchcomment LIKE '%$search_term%'";

$result = mysql_query($query) or die("Site Search Completed.");
while($row = mysql_fetch_row($result))
{
echo "<tr><td><INPUT NAME=\"edit_line\" TYPE=\"Radio\" Value=\"$row[3]\"></td><td><a target=\"_blank\"  href=\"$row[1]\"><b>$row[0]</b></a><td><i>$row[2]</i></tr>";
}

// SEARCH Site_Owners ///////////////

echo "<tr><td colspan = \"3\"> <hr><p></tr><tr><th align=\"left\">Searching Owner Names:</tr>";

$query2 = "SELECT site_id, site_firstname, site_lastname FROM Site_Owners WHERE site_firstname LIKE '%$search_term%' OR site_lastname LIKE '%$search_term%'";

$result2 = mysql_query($query2) or die("<tr><td>No match found.</tr>");

while($row2 = mysql_fetch_row($result2))
{

	$query3 = "SELECT site_name, site_url, site_comment, site_id FROM Sites WHERE site_id = '$row2[0]'";

	$result3 = mysql_query($query3) or die("No match found.");
	while($row3 = mysql_fetch_row($result3))
	{
	echo "<tr><td><INPUT NAME=\"edit_line\" TYPE=\"Radio\" Value=\"$row2[0]\"></td><td><a target=\"_blank\" href=\"$row3[1]\"><b>$row3[0]</b></a><td>$row2[1] $row2[2]<td><i>$row3[2]</i></tr>";
	}
}

// SEARCH Cruising Areas ///////////////

echo "<tr><td colspan=\"3\"> <hr><p></tr><tr><th align=\"left\">Searching Cruising Areas:</tr>";

$query4 = "SELECT site_id, site_area FROM Site_Area WHERE site_area LIKE '%$search_term%'";

$result4 = mysql_query($query4) or die("<tr><td>No match found.</tr>");

while($row4 = mysql_fetch_row($result4))
{

	$query5 = "SELECT site_name, site_url, site_comment, site_id FROM Sites WHERE site_id = '$row4[0]'";

	$result5 = mysql_query($query5) or die("No match found.");
	while($row5 = mysql_fetch_row($result5))
	{
	echo "<tr><td><INPUT NAME=\"edit_line\" TYPE=\"Radio\" Value=\"$row4[0]\"></td><td><a target=\"_blank\" href=\"$row5[1]\"><b>$row5[0]</b></a><td>$row4[1]<td><i>$row5[2]</i></tr>";
	}
}

echo "<tr><td colspan=\"3\"><hr></table>";
echo "<INPUT TYPE = SUBMIT>";
echo "</FORM>";

echo "<p><a href=\"search_edit.php\">New Search?</a><p>";
echo "<p><a href=\"add_url.php\">Add URL</a><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";

?>

</BODY></HTML>
