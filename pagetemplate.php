<?php

$cat_id=$HTTP_GET_VARS['cat_id'];

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
<meta name=\"description\" content=\"";

$descfile="/home/cruisenews/inc/desc/".$cat_id."desc.inc";

if(file_exists($descfile))
{
	include "$descfile";
}

echo "\">\n
<meta name=\"keywords\" content=\"";

$keyfile="/home/cruisenews/inc/key/".$cat_id."key.inc";
$sitefile="/home/cruisenews/inc/key/sitekey.inc";
if(file_exists($keyfile))
{
	include "$sitefile";
	include "$keyfile";
}

echo "\">\n
<title>$cat_name</title>\n
<link type=\"text/css\" rel=\"stylesheet\" href=\"http://cruisenews.net/style.css\">\n";

//////////////////////////////////
// GOOGLE ANALYTICS //////////////
//////////////////////////////////

echo "<script type=\"text/javascript\">

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
<body>\n";

echo "
<a href=\"/\" BORDER=\"0\"><img SRC=\"http://cruisenews.net/images/a30-543.gif\" WIDTH=\"208\" HEIGHT=\"266\" BORDER=\"0\" ALIGN=\"top\" ALT=\"BACK TO HOME PORT\"></a>\n
<h1>Guide to Sailing and Cruising Stories</h1>\n
<p>\n
<img WIDTH=\"100%\" HEIGHT=\"4\" SRC=\"http://cruisenews.net/images/redline.gif\">\n
<p>\n
<h1><i>$cat_name</i></h1>\n
<img WIDTH=\"100%\" HEIGHT=\"4\" SRC=\"http://cruisenews.net/images/redline.gif\">\n
<p>\n

<table width=\"100%\" bgcolor=\"white\" align=center cellpadding=1>\n
<tr>\n
<td  colspan=4>\n";


///////////////////////////
// adsense ////////
///////////////////////////

//include "/home/cruisenews/inc/adsense.inc";


echo "

<a href=\"http://www.myboatplans.com/cb?cb=cns3884\"><img src=\"http://www.myboatplans.com/images/banners/468x60-3.jpg\" border=0 alt=\"MyBoatPlans\"></a>
</td>
</tr>

<tr>
<td width=160 valign=top rowspan=1000>";


////////////////////////////////
// GUIDEDIR ////////
////////////////////////////////

include "/home/cruisenews/inc/guidedir.inc";

echo "</td><td height=1></td><td height=1></td>\n";

echo "<td align=right valign=top rowspan=1000>\n";

/////////////////////////////////
// ADSENSE //////////////////////
/////////////////////////////////

echo "<script type=\"text/javascript\"><!--
google_ad_client = \"pub-0460282711081659\";
/* cruisenews 120x600, created 6/20/10 */
google_ad_slot = \"5475854029\";
google_ad_width = 120;
google_ad_height = 600;
//-->
</script>
<script type=\"text/javascript\"
src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">
</script></td></tr>\n"; 

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

///////////////////////////////////
// TEXTFILE INSERT ////////////////
///////////////////////////////////

$textfile="/home/cruisenews/inc/text/".$cat_id."text.inc";

if(file_exists($textfile))
{
	echo "</table><table align=center bgcolor=white><tr><td><hr><p>\n";
	include "$textfile";
	echo "</td><tr>";
}

///////////////////////////////////

echo "
<tr>
<td colspan=4 valign=bottom>\n";

///////////////////////////
// adsense ////////
///////////////////////////

include "/home/cruisenews/inc/adsense.inc";

echo "</td>
</tr>";

echo "</table><table width=\"100%\" align=center bgcolor=white><tr><td align=center>
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
