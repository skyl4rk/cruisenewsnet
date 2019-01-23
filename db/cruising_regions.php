<?php

$cat_id=$HTTP_GET_VARS['cat_id'];

//////////////////////////
// connection //
/////////////////////////

include "/home/cruisenews/common_db.php";
$link_id = db_connect();
if(!$link_id) die(sql_error());

echo "<html>\n
<head>\n
<title>Cruising Regions Around the World</title>\n
<script type=\"text/javascript\">

  var _gaq = _gaq || [];
  _gaq.push([\'_setAccount\', \'UA-17085653-1\']);
  _gaq.push([\'_trackPageview\']);

  (function() {
    var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
    ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
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
<h1><i>Cruising Regions Around the World</i></h1>\n
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
echo "<tr><td><b><i>Click on any of the regions below for a list of cruising websites related to that region.</i></td></tr>\n";

$site_arealist_query = "SELECT * FROM Site_Arealist";
$site_arealist_result = mysql_query($site_arealist_query) or die(sql_error());
while($site_arealist_array = mysql_fetch_row($site_arealist_result))
	{
			echo "<tr><td><b><a href=\"http://cruisenews.net/db/region.php?region=$site_arealist_array[0]\">$site_arealist_array[0]</a></b></td></tr>\n";
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
