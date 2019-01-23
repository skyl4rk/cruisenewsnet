<HTML>
<HEAD><TITLE>EDIT RECORD</TITLE></HEAD>
<BODY>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());
echo "<h2>Edit Site Info</h2>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a><p><hr>";


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

/*

	print "<tr><td><INPUT NAME=\"edit_line\" TYPE=\"Radio\" Value=\"$row[0]\"></td><td> $row[0]</td><td> $row[1]</td><td> $row[3]</td><td> $row5[1]</td><td> $row[5]</td> <td>$row[6]</td><td> $row[7]</td><td> $row[8]</td><td> $row2[1]</td><td> $row3[1]</td><td> $row3[2] </td><td> $row[2]</td></table>";

*/

echo "<FORM METHOD=POST ACTION=\"edit_record3.php\">";
echo "<table border = \"1\">";

echo "<INPUT TYPE=HIDDEN NAME=site_id VALUE= \"$edit_line\"></td></tr>";
echo "<tr><td>Site Name: </td><td><INPUT NAME=site_name TYPE=\"TEXT\" VALUE= \"$row[1]\"></td><td></td><td>REQUIRED SELECTIONS!</td></tr>";

echo "<tr><td>Current Site Rating: </td><td>$row[3]</td>";
echo "<td>New Site Rating \n</td>";
echo "<td bgcolor=\"red\"><select NAME=\"site_rating\" >\n";
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
echo "</select></tr>\n";



echo "<tr><td>Current Category: </td><td>$row5[1]</td>";
echo "<td>New Category: </td>";
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
		echo "\">";
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

echo "</select>\n";

//echo "<tr><td>At Sea? (TRUE/FALSE)</td><td><INPUT NAME=site_atsea TYPE=\"TEXT\" VALUE= \"$row[5]\"></td></tr>";


echo "<tr><td>Currently at sea:</td><td>$row[5]</td><td>New Selection:</td><td bgcolor=\"red\"><SELECT NAME=\"site_atsea\" >\n";
echo "<option>FALSE</option>\n";
echo "<option>TRUE</option>\n";
echo "</select>\n</tr>";

echo "<tr><td>Current Area: </td><td>$row2[1]<td>New Area:</td><td bgcolor=\"red\">";
echo "<select NAME=\"site_area\">\n";
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
echo "</select>\n</tr>";





echo "<tr><td>Comments: </td><td><INPUT NAME=site_comment TYPE=\"TEXT\" VALUE= \"$row[6]\"></td></tr>";


echo "<tr><td>First Name: </td><td><INPUT NAME=site_firstname TYPE=\"TEXT\" VALUE= \"$row3[1]\"></td></tr>";
echo "<tr><td>Last Name: </td><td><INPUT NAME=site_lastname TYPE=\"TEXT\" VALUE= \"$row3[2]\"></td></tr>";
echo "<tr><td>URL: </td><td><INPUT NAME=site_url TYPE=\"TEXT\" VALUE= \"$row[2]\"></td></tr>";
echo "<tr><td>Hidden Comments: </td><td><INPUT NAME=site_searchcomment TYPE=\"TEXT\" VALUE= \"$row[7]\"></td></tr>";

echo "<table><p>";

echo "<INPUT TYPE=\"SUBMIT\"></FORM>";

echo "<p><hr><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";



?>

</BODY></HTML>
