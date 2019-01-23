<HTML>
<HEAD><TITLE>EDIT RECORD</TITLE></HEAD>
<BODY text=\"#000000\" link=\"#ff0000\" vlink=\"#0000ff\" bgcolor=white>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());
echo "<h2>Edit Site Info</h2>\n";
echo "<a href=\"index.html\">Cruisenews Admin Index</a><br>\n";
echo "<a href=\"search_edit.php\">New Search and Edit</a><br>\n";
echo "<a href=\"add_url.php\">Add URL</a><br><hr>\n";

$query = "SELECT * FROM Sites WHERE site_id = $edit_line";
$result = mysql_query($query) or die("Query failed");
$row = mysql_fetch_row($result);

$query2 = "SELECT * FROM Site_Area WHERE site_id = $edit_line";
$result2 = mysql_query($query2) or die("Query failed");
$row2 = mysql_fetch_row($result2);

$query3 = "SELECT * FROM Site_Owners WHERE site_id = $edit_line";
$result3 = mysql_query($query3) or die("Query failed");
$row3 = mysql_fetch_row($result3);

$query4 = "SELECT * FROM Site_Categories WHERE site_id = $edit_line";
$result4 = mysql_query($query4) or die("Query failed");
$row4 = mysql_fetch_row($result4);

$query5 = "SELECT * FROM Categories WHERE cat_id = $row4[1]";
$result5 = mysql_query($query5) or die("Query failed");
$row5 = mysql_fetch_row($result5);

/* UNCOMMENT THIS TO SHOW RAW DATA
print "<tr><td><INPUT NAME=\"edit_line\" TYPE=\"Radio\" Value=\"$row[0]\"></td><td> $row[0]</td><td> $row[1]</td><td> $row[3]</td><td> $row5[1]</td><td> $row[5]</td> <td>$row[6]</td><td> $row[7]</td><td> $row[8]</td><td> $row2[1]</td><td> $row3[1]</td><td> $row3[2] </td><td> $row[2]</td></table>";
*/

/////////////////////////////////
// INLINE FRAME WITH SITE VIEW //
/////////////////////////////////

echo "<table border=1 width=\"97%\">\n";
echo "<tr><td bgcolor=white><h2>$row[1]<br><a href=\"$row[2]\" target=\"_blank\">$row[2]</h2></td></tr>";
echo "<tr><td>\n";
echo "<iframe align=center width=\"100%\" height=1000 title=\"Site Review\" border=1 src=\"";
echo $row[2];
echo "\"></iframe>\n";
echo "</td></tr>\n";
echo "</table>\n";

//////////////////////////////////

echo "<FORM METHOD=POST ACTION=\"edit_record3.php\">\n";
echo "<INPUT TYPE=HIDDEN NAME=site_id VALUE= \"$edit_line\">\n";

echo "<table border = \"1\">\n";

echo "<tr>\n<td>Site Name: </td>\n<td><INPUT NAME=site_name TYPE=\"TEXT\" VALUE= \"$row[1]\" SIZE=40></td></tr>\n";

echo "<tr>\n";
echo "<td>Site Rating: </td>\n";
echo "<td bgcolor=\"red\">\n<select NAME=\"site_rating\">\n";

echo "<option";
if ($row[3]==1){echo " SELECTED";}
echo ">1</option>\n";

echo "<option";
if ($row[3]==2){echo " SELECTED";}
echo ">2</option>\n";

echo "<option";
if ($row[3]==3){echo " SELECTED";}
echo ">3</option>\n";

echo "<option";
if ($row[3]==4){echo " SELECTED";}
echo ">4</option>\n";

echo "<option";
if ($row[3]==5){echo " SELECTED";}
echo ">5</option>\n";

echo "<option";
if ($row[3]==6){echo " SELECTED";}
echo ">6</option>\n";

echo "<option";
if ($row[3]==7){echo " SELECTED";}
echo ">7</option>\n";

echo "<option";
if ($row[3]==8){echo " SELECTED";}
echo ">8</option>\n";

echo "<option";
if ($row[3]==9){echo " SELECTED";}
echo ">9</option>\n";

echo "<option";
if ($row[3]==10){echo " SELECTED";}
echo ">10</option>\n";

echo "</select>\n</td></tr>\n";

echo "<tr>";
echo "<td>Category: </td>\n";
echo "<td bgcolor=\"red\"><select NAME=\"cat_name\" >\n";
//
$page_query = "SELECT page_id FROM Pages";
$page_result = mysql_query($page_query) or die(sql_error());
while($page_row = mysql_fetch_row($page_result))
{
	$cat_id_query = "SELECT cat_id FROM Page_Cat WHERE page_id = '$page_row[0]' ORDER BY cat_order";
	$cat_id_result = mysql_query($cat_id_query) or die(sql_error());

	while($cat_id_array = mysql_fetch_row($cat_id_result))
	{
		$cat_name_query = "SELECT cat_name FROM Categories WHERE cat_id = '$cat_id_array[0]'";
		$cat_name_result = mysql_query($cat_name_query) or die(sql_error());
		$cat_name_array = mysql_fetch_row($cat_name_result) or die(sql_error());

		echo "<option value=\"";
		echo $cat_name_array[0];
		echo "\"";
		if ($row5[1]==$cat_name_array[0]) {echo " SELECTED";}
		echo ">";
		echo "$cat_name_array[0]";
		echo "</option>\n";
	}
}

/*
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
*/

echo "</select></td>\n";

echo "<tr><td>At Sea?:</td>\n<td bgcolor=\"red\">\n<SELECT NAME=\"site_atsea\" >\n";

echo "<option";
if ($row[5]=="FALSE") {echo " SELECTED";}
echo ">FALSE</option>\n";

echo "<option";
if ($row[5]=="TRUE") {echo " SELECTED";}
echo ">TRUE</option>\n";

echo "</select>\n</td></tr>\n";

echo "<tr><td>Area:</td><td bgcolor=\"red\">";
echo "<select NAME=\"site_area\">\n";
$area_query = "SELECT site_arealist FROM Site_Arealist";
$area_result = mysql_query($area_query);
if(!$area_result) die(sql_error());
while ($area_data = mysql_fetch_row($area_result))
{
	echo "<option value=\"";
	echo $area_data[0];
	echo "\"";
	if ($row2[1]==$area_data[0]) {echo " SELECTED";}
	echo ">";
	echo "$area_data[0]";
	echo "</option>\n";
}
echo "</select>\n</td></tr>\n";

echo "<tr><td>Comments: </td>\n<td><INPUT NAME=site_comment TYPE=\"TEXT\" VALUE= \"$row[6]\" SIZE=40>\n</td></tr>\n";


echo "<tr><td>First Name: </td>\n<td><INPUT NAME=site_firstname TYPE=\"TEXT\" VALUE= \"$row3[1]\" SIZE=40>\n</td></tr>\n";
echo "<tr><td>Last Name: </td>\n<td><INPUT NAME=site_lastname TYPE=\"TEXT\" VALUE= \"$row3[2]\" SIZE=40>\n</td></tr>\n";
echo "<tr><td>URL: </td><td><INPUT NAME=site_url TYPE=\"TEXT\" VALUE= \"$row[2]\" SIZE=40>\n</td></tr>\n";
echo "<tr><td>Hidden Comments: </td>\n<td><INPUT NAME=site_searchcomment TYPE=\"TEXT\" VALUE= \"$row[7]\" SIZE=40>\n</td></tr>\n";

echo "</table><p>\n";

echo "<INPUT TYPE=\"SUBMIT\"></FORM>\n";

echo "<p><hr><p>\n";
echo "<a href=\"index.html\">Cruisenews Admin Index</a><br>\n";
echo "<a href=\"search_edit.php\">New Search and Edit</a><br>\n";
echo "<a href=\"add_url.php\">Add URL</a><br>\n";

$next_record=$edit_line+1;

echo "<a href=\"edit_record2.php?edit_line=$next_record\">Review Next Record</a><br>\n";

echo "<a href=\"edit_record2noifr.php?edit_line=$next_record\">Review Next Record Without Site Frame</a><p><hr>\n";


?>

</BODY></HTML>
