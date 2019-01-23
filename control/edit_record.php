<HTML>
<HEAD><TITLE>EDIT RECORD</TITLE></HEAD>
<BODY>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

$query = "SELECT * FROM Sites";
$result = mysql_query($query) or die("Query failed");

$num_rows = mysql_num_rows($result) or die("$query did not return any data");
print "<h2> $num_rows Records in the Cruisenews Database</h2><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";
echo "<p><hr><p>";
echo "<h2>Select a record to edit:</h2><p>";
echo "<FORM METHOD=GET ACTION=\"edit_record2.php\">";

echo "<table border=\"1\" cellpadding=\"2\">";

while($row = mysql_fetch_row($result))
{
$query2 = "SELECT * FROM Site_Area WHERE site_id = $row[0]";
$result2 = mysql_query($query2) /* or die("Query failed")*/;
$row2 = mysql_fetch_row($result2);

$query3 = "SELECT * FROM Site_Owners WHERE site_id = $row[0]";
$result3 = mysql_query($query3) or die("Query failed");
$row3 = mysql_fetch_row($result3);

$query4 = "SELECT * FROM Site_Categories WHERE site_id = $row[0]";
$result4 = mysql_query($query4) or die("Query failed");
$row4 = mysql_fetch_row($result4);

$query5 = "SELECT * FROM Categories WHERE cat_id = $row4[1]";
$result5 = mysql_query($query5) or die("Query failed");
$row5 = mysql_fetch_row($result5);

/*

$row]0] = $site_id
$row[1] = $site_name 
$row[3] = $site_rating
$row5[1]= $cat_name
$row[5] = $site_atsea
$row[6] = $site_comment
$row[7] = $site_searchcomment
$row2[1]= $site_area
$row3[1]= $site_firstname
$row3[2]= $site_lastname
$row[2] = $site_url

*/

print "<tr><td><INPUT NAME=\"edit_line\" TYPE=\"Radio\" Value=\"$row[0]\"></td><td> $row[0]</td><td> $row[1]</td><td> $row[3]</td><td> $row5[1]</td><td> $row[5]</td> <td>$row[6]</td><td> $row2[1]</td><td> $row3[1]</td><td> $row3[2] </td><td> $row[7]</td><td> $row[2]</td>";
}

echo "</table><p>";
echo "<INPUT TYPE = SUBMIT>";
echo "</FORM>";

echo "<p><hr><a href=\"index.html\">Cruisenews Admin Index</a>";
?>



</BODY></HTML>