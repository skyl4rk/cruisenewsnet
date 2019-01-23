<?php

$region=$HTTP_GET_VARS['region'];

//////////////////////////
// connection //
/////////////////////////

include "/home/cruisenews/common_db.php";
$link_id = db_connect();
if(!$link_id) die(sql_error());

echo "<html>\n
<head>\n
<title>Cruising Websites: $region</title>\n
</head>\n
<body text=\"#000000\" link=\"#ff0000\" vlink=\"#0000ff\" background=http://cruisenews.net/images/naut14.jpg>\n
<font face=\"verdana\"><p><b>\n";
echo "<table>";
echo "<tr>
<td>
<a href=\"/\" BORDER=\"0\"><img SRC=\"http://cruisenews.net/images/a30-543.gif\" WIDTH=\"208\" HEIGHT=\"266\" BORDER=\"0\" ALIGN=\"top\" ALT=\"BACK TO HOME PORT\"></a>\n
<h1>Guide to Sailing and Cruising Stories</h1>\n
<p>\n
<img WIDTH=\"100%\" HEIGHT=\"4\" SRC=\"http://cruisenews.net/images/redline.gif\">\n
<p>\n
<h1><i>Cruising Websites: $region</i></h1>\n
<img WIDTH=\"100%\" HEIGHT=\"4\" SRC=\"http://cruisenews.net/images/redline.gif\">\n
<p>\n
</table>\n

<table width=\"95%\" bgcolor=\"white\" align=center cellpadding=4>\n
<tr>\n
<td  colspan=3>\n";


///////////////////////////
// adsense ////////
///////////////////////////

include "/home/cruisenews/inc/adsense.inc";

echo "</td>
</tr>

<tr>
<td width=160 valign=top rowspan=1000>";


////////////////////////////////
// GUIDEDIR ////////
////////////////////////////////

include "/home/cruisenews/inc/guidedir.inc";

echo "</td></tr>\n"; 
echo "<td rowspan=1000 width=20></td><td>";

echo "<tr><td><i>Cruising websites: $region<br>Back to <a href=\"http://cruisenews.net/db/cruising_regions.php\">Cruising Regions</a></i></td></tr>\n";

$site_id_query = "SELECT * FROM Site_Area WHERE site_area='$region'";
$site_id_result = mysql_query($site_id_query) or die(sql_error());
while($site_id_array = mysql_fetch_row($site_id_result))
	{

		$site_query = "SELECT site_id, site_url, site_name, site_comment FROM Sites WHERE site_id = '$site_id_array[0]'";
		$site_result = mysql_query($site_query) or die(sql_error());

		while($site_array = mysql_fetch_row($site_result))
		{
			echo "<tr valign=top><td width=\"40%\" align=left><a target=\"_blank\" href=\"http://cruisenews.net/db/page.php?site_id=$site_array[0]\"><b>$site_array[2]</b></a></td>";
			echo "<td align=\"left\"><i>$site_array[3]</i></td></tr>\n";
		}
	}	

echo "
<tr>
<td colspan=2>\n
<p>\n
</td>\n
</tr>\n";


echo "</table><table width=\"95%\" align=center bgcolor=white><tr><td align=center>
<hr></td><tr><td align=center>\n";


/////////////////////////////
// siteindex ////////
////////////////////////////

include "/home/cruisenews/inc/siteindex.inc";
?>

</td>
</tr>
<tr>
<td>

</td>
</tr>
</table>
<p>
</BODY>
</HTML>
