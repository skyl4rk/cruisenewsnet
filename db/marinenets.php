<?php

$cat_id=20;

//////////////////////////
// connection //
/////////////////////////

include "/home/cruisenews/common_db.php";
$link_id = db_connect();
if(!$link_id) die(sql_error());

///////////////////////////////
// get cat_name //
//////////////////////////////

$query = "SELECT cat_name FROM Categories WHERE cat_id = '$cat_id'";
$result = mysql_query($query) or die(sql_error());
$array = mysql_fetch_array($result) or die(sql_error());
$cat_name = $array[0];

echo "<html>\n
<head>\n
<meta name=\"description\" content=\"Links to sailing and cruising stories, passagemaking, ocean voyages, bluewater yacht sailing adventure travel\">\n
<meta name=\"keywords\" content=\"sailing,cruising,yacht,sail,ocean,boats,bluewater,passagemaking,voyage,adventure,travel,cruise,links\">\n
<title>$cat_name</title>\n
</head>\n
<body text=\"#000000\" link=\"#ff0000\" vlink=\"#0000ff\" background=http://cruisenews.net/images/naut14.jpg>\n
<font face=\"verdana\"><p><b>\n
<table width=\"95%\" align=center>\n
<tr>
<td>
<a href=\"/\" BORDER=\"0\"><img SRC=\"http://cruisenews.net/images/a30-543.gif\" WIDTH=\"208\" HEIGHT=\"266\" BORDER=\"0\" ALIGN=\"top\" ALT=\"BACK TO HOME PORT\"></a>\n
<h1>Guide to Sailing and Cruising Stories</h1>\n
<p>\n
<img WIDTH=\"100%\" HEIGHT=\"4\" SRC=\"http://cruisenews.net/images/redline.gif\">\n
<p>\n
<h1><i>$cat_name</i></h1>\n
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
<td width=140 valign=top rowspan=1000>";


////////////////////////////////
// GUIDEDIR ////////
////////////////////////////////

include "/home/cruisenews/inc/guidedir.inc";

echo "</td></tr>\n"; 

/*
	+-----------------------------------------------------------+
	  get site id's for each category
	+-----------------------------------------------------------+
	*/

	$site_cat_query = "SELECT site_id FROM Site_Categories WHERE cat_id = '$cat_id' ORDER BY site_rating";
	$site_cat_result = mysql_query($site_cat_query) or die(sql_error());

	/*
	+-----------------------------------------------------------+
	  get site information for each site id 
	+-----------------------------------------------------------+
	*/

	while($site_cat_array = mysql_fetch_row($site_cat_result))
	{

		$site_query = "SELECT site_id, site_url, site_name, site_comment FROM Sites WHERE site_id = '$site_cat_array[0]' ORDER BY site_rating";
		$site_result = mysql_query($site_query) or die(sql_error());

		/*
		+-----------------------------------------------------------+
		  loop and write site name link, comments
		+-----------------------------------------------------------+
		*/

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
</tr>\n

<tr>\n
<td>\n

<b>
<a href=\"mailto:admin@cruisenews.net\">Report or update a maritime marine net</a>
<p>
<table border cellspacing=0 cellpadding=5 bgcolor=\"white\" align=\"center\">
<tr>
<td  colspan=3>
<h3>15 Meters</h3>

</td>
</tr>

<tr><td>1130 UTC</td><td>South Atlantic Net</td><td>21.325 Mhz</td></tr>
<tr><td>1300 UTC</td><td>Transatlantic Net, wrsmyth@hotmail.com</td><td>21.400 Mhz</td></tr>
<tr><td>2200 UTC</td><td>Pacific M/M Service Net</td><td>21.402 Mhz</td></tr>
</tr>

<tr>
<td  colspan=3>
<h3>20 Meters</h3>
</td>
</tr>

<tr>
<tr><td>0200 UTC</td><td><a href=\"http://www.wcinet.net/~aspect/sf.htm\">Pacific Seafarers Net </a></td><td>14.313 Mhz </td></tr>
<tr><td>0400 UTC</td><td>Maritime Emergency Net</td><td>14.310 Mhz</td></tr>

<tr><td>0400 UTC</td><td>DDD Net - Pacific for Canada</td><td>14.115 Mhz </td></tr>
<tr><td>0500 UTC</td><td>Tony\'s Net - Kenya</td><td>14.316 Mhz</td></tr>
<tr><td>0630 UTC</td><td>M/M Net - South Africa</td><td>14.316 Mhz</td></tr>
<tr><td>0700 UTC</td><td>Mariana - Guam</td><td>14.310 Mhz </td></tr>
<tr><td>0800 UTC</td><td>U.K. M/M Net</td><td>14.303 Mhz</td></tr>

<tr><td>1000 UTC</td><td>Robby\'s Net - Australia</td><td>14.315 Mhz   </td></tr>
<tr><td>1130 UTC</td><td>M/M Net - South Africa</td><td>14.316 Mhz </td></tr>
<tr><td>1245 UTC</td><td>Mississauga Net</td><td>14.121 Mhz</td></tr>
<tr><td>1700 UTC</td><td><a href=\"http://www2.acan.net/~mmsn/mmsn.htm\">Maritime Mobile Service Net</a></td><td>14.300 Mhz</td></tr>
<tr><td>1730 UTC</td><td>DDD Net - Pacific for Canada</td><td>14.115 Mhz</td></tr>

<tr><td>1800 UTC</td><td>Maritime Emergency Net</td><td>14.303 Mhz</td></tr>
<tr><td>1800 UTC</td><td>U.K. M/M Net</td><td>14.303 Mhz</td></tr>
<tr><td>1900 UTC</td><td><a href=\"http://www.geocities.com/TheTropics/3989/index.html\">Manana M/M Net</a></td><td>14.340 Mhz</td></tr>
<tr><td>1900 UTC</td><td>Confusion Net - Monday through Friday</td><td>14.305 Mhz</td></tr>
<tr><td>1900 UTC</td><td>Mariana Net - Monday through Saturday</td><td>14.340 Mhz</td></tr>

<tr><td>2000 UTC</td><td>Italian Maritime Mobile Net, IK6IJF@hotmail.com</td><td>14.340 Mhz</td></tr>
<tr><td>2100 UTC</td><td>Tony\'s Net - New Zealand </td><td>14.315 Mhz</td></tr>
<tr><td>2300 UTC</td><td>Robby\'s Net - Australia</td><td>14.315 Mhz  </td></tr>
<tr><td>2300 UTC</td><td>California to Caribbean - Mondays</td><td>14.285 Mhz</td></tr>
<tr><td>2310 UTC</td><td>California to South Pacific - Mondays</td><td>14.285 Mhz</td></tr>

<tr><td>2400 UTC</td><td>S.E.Asia M/M Net</td><td>14.320 Mhz</td></tr>
<tr><td>As needed</td><td>Hurricane Net</td><td>14.325 Mhz</td></tr>
</tr>


<tr>
<td  colspan=3>
<h3>40 Meters</h3>
</td>
</tr>

<tr><td>0000 UTC</td><td>Caribbean Net</td><td>7.158 Mhz</td></tr>
<tr><td>0030 UTC</td><td>S.E.Asia M/M Net</td><td>7.085 Mhz</td></tr>
<tr><td>0630 UTC</td><td>M/M Net - South Africa</td><td>7.045 Mhz</td></tr>
<tr><td>0700 UTC</td><td>Mediterranean M/M Net</td><td>7.085 Mhz</td></tr>

<tr><td>1100 UTC</td><td><a href=\"http://www.viaccess.net/~kv4jc/\">Caribbean Maritime Mobile Net</a></td><td>7.241 Mhz</td></tr>
<tr><td>1100 UTC</td><td>Caribbean M/M Net - Saint Croix</td><td>7.230 Mhz</td></tr>
<tr><td>1130 UTC</td><td>M/M Net  - South Africa</td><td>7.045 Mhz </td></tr>
<tr><td>1245 UTC</td><td>Waterways Radio Cruising Club</td><td>7.268 Mhz</td></tr>
<tr><td>1300 UTC</td><td>Central American Breakfast Club Cruisers Net</td><td>7.083 Mhz</td></tr>

<tr><td>1530 UTC</td><td>Chubasco Net, Mexico West Coast</td><td>7.294 Mhz</td></tr>
<tr><td>1530 UTC</td><td>Baja California M/M Net</td><td>7.238 Mhz</td></tr>
<tr><td>2230 UTC</td><td>West Coast Admirals Net</td><td>7.190 Mhz</td></tr>
<tr><td>\"All Day\"</td><td>SE Alaska Mariners Net</td><td>7.265 Mhz</td></tr>

</tr>

<tr>
<td  colspan=3>
<h3>Marine SSB</h3>
Amateur radio license not required to participate in Marine SSB nets.
</td>
</tr>
<tr><td>0830 UTC</td><td>Russell Radio - New Zealand</td><td>12.359 Mhz</td></tr>
<tr><td>1215 UTC</td><td>Caribbean Safety and Security Net</td><td>8.104 Mhz</td></tr>

<tr><td>1230 UTC</td><td><a target=\"_blank\" href=\"http://www.caribwx.com/ssb1.html\">Caribbean Weather Net</a> Note: 8:30 a.m. Eastern DST</td><td>8.104 Mhz</td></tr>
<tr><td>1330 UTC</td><td>Cruiseheimer\'s Net</td><td>8.152 Mhz</td></tr>
<tr><td>1330 UTC</td><td>Panama Connection Net</td><td>8.107 Mhz</td></tr>
<tr><td>1400 UTC</td><td>Sonrisa Net</td><td>3.968 Mhz</td></tr>

<tr><td>1400 UTC</td><td>Cruisers Southbound Net</td><td>4.051 Mhz</td></tr>
<tr><td>1400 UTC</td><td>Papaguayo Net</td><td>4.030 Mhz</td></tr>
<tr><td>1400 UTC</td><td>Northwest Caribbean Cruisers Net</td><td>8.188 Mhz</td></tr>
<tr><td>1630 UTC</td><td>Russell Radio - New Zealand</td><td>12.359 Mhz</td></tr>
<tr><td>1930 UTC</td><td>Herb\'s Weather</td><td>12.359</td></tr>

</table>
<p>

</td>\n
</tr>\n
</table>\n

<table width=\"95%\" bgcolor=white align=center>\n
<tr>\n
<td align=center>\n
<hr>\n";

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
