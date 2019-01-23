<HTML>
<HEAD><TITLE>EDIT RECORD</TITLE></HEAD>
<BODY>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());
echo "<h2>Site Edit Results</h2><p>";

echo "<a href=\"index.html\">Cruisenews Admin Index</a><br>\n";
echo "<a href=\"search_edit.php\">New Search and Edit</a><br>\n";
echo "<a href=\"add_url.php\">Add URL</a><br><hr>\n";

$update1 = "UPDATE Sites SET site_name = '$site_name' WHERE site_id = '$site_id'";
$result1 = mysql_query($update1) or die(sql_error());

$query2 = "SELECT * FROM Categories WHERE cat_name = '$cat_name'";
$result2 = mysql_query($query2) or die(sql_error());
$row2 = mysql_fetch_row($result2);
$cat_id = $row2[0];

$update2 = "UPDATE Site_Categories SET cat_id = '$cat_id' WHERE site_id = '$site_id'";
$result22 = mysql_query($update2) or die(sql_error());

$update3 = "UPDATE Sites SET site_atsea = '$site_atsea' WHERE site_id = '$site_id'";
$result3 = mysql_query($update3) or die(sql_error());

$update4 = "UPDATE Sites SET site_comment = '$site_comment' WHERE site_id = '$site_id'";
$result = mysql_query($update4) or die(sql_error());

$update5 = "UPDATE Sites SET site_searchcomment = '$site_searchcomment' WHERE site_id = '$site_id'";
$result = mysql_query($update5) or die(sql_error());

$update6 = "UPDATE Site_Area SET site_area = '$site_area' WHERE site_id = '$site_id'";
$result = mysql_query($update6) or die(sql_error());

$update7 = "UPDATE Site_Owners SET site_firstname = '$site_firstname' WHERE site_id = '$site_id'";
$result = mysql_query($update7) or die(sql_error());

$update8 = "UPDATE Site_Owners SET site_lastname = '$site_lastname' WHERE site_id = '$site_id'";
$result = mysql_query($update8) or die(sql_error());

$update9 = "UPDATE Sites SET site_url = '$site_url' WHERE site_id = '$site_id'";
$result = mysql_query($update9) or die(sql_error());

$update10 = "UPDATE Sites SET site_rating = '$site_rating' WHERE site_id = '$site_id'";
$result = mysql_query($update10) or die(sql_error());

$update11 = "UPDATE Site_Categories SET site_rating = '$site_rating' WHERE site_id = '$site_id'";
$result = mysql_query($update11) or die(sql_error());

print "<h2>Updated the Following Record:</h2><table border=\"1\">
<tr><td>Record Number:</td><td>$site_id 
<tr><td>Site Name:</td><td>$site_name 
<tr><td>Category:</td><td>$cat_name 
<tr><td>Site Rating</td><td>$site_rating
<tr><td>At Sea?</td><td>$site_atsea 
<tr><td>Comment:</td><td>$site_comment 
<tr><td>Hidden Comment:</td><td>$site_searchcomment 
<tr><td>Area:</td><td>$site_area 
<tr><td>Firstname:</td><td>$site_firstname 
<tr><td>Last Name:</td><td>$site_lastname 
<tr><td>Site URL:</td><td>$site_url
</table><p>";

echo "<a href=\"index.html\">Cruisenews Admin Index</a><br>\n";
echo "<a href=\"search_edit.php\">New Search and Edit</a><br>\n";
echo "<a href=\"add_url.php\">Add URL</a><br>\n";
echo "<a href=\"edit_record2.php?edit_line=$site_id\">Edit this Record</a><br>";

$next_record=$site_id+1;

echo "<a href=\"edit_record2.php?edit_line=$next_record\">Review Next Record</a><br>\n";
echo "<a href=\"edit_record2noifr.php?edit_line=$next_record\">Review Next Record Without Site Frame</a><p>\n";
echo "<p><hr><p>";


?>


</BODY></HTML>
