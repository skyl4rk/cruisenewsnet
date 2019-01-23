<html>
<head>
</head>
<body>

<?php
$site_id=$HTTP_GET_VARS['site_id'];

//////////////////////////
// connection //
/////////////////////////

include "/home/cruisenews/common_db.php";
$link_id = db_connect();
if(!$link_id) die(sql_error());

//////////////////////////
// get site_url //
/////////////////////////

$site_query = "SELECT site_url FROM Sites WHERE site_id = '$site_id'";
$site_result = mysql_query($site_query) or die(sql_error());
$site_array = mysql_fetch_array($site_result) or die(sql_error());

//////////////////////////////////////
// Refresh to site_url //
//////////////////////////////////////

echo "<META HTTP-EQUIV=Refresh CONTENT=\"0; URL=$site_array[0]\">\n";

?>
</body>
</html>
