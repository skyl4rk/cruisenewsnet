<html>
<head>
<meta name="description" content="DESCRIPTION HERE">
<meta name="keywords" content="KEYWORDS HERE">
<title>Charts and Imagery</title>
</head>
<body text="#000000" link="#0000ff" vlink="#ff0000" background=http://cruisenews.net/images/naut14.jpg>
<font face="verdana"><p><b>
<a href="/" BORDER="0"><img SRC="http://cruisenews.net/images/a30-543.gif" WIDTH="208" HEIGHT="266" BORDER="0" ALIGN="top" ALT="BACK TO HOME PORT"></a>
<h1>Guide to Sailing and Cruising Stories</h1>

<p>
<img WIDTH="100%" HEIGHT="4" SRC="http://cruisenews.net/images/redline.gif">
<p>
<h1><i>Charts and Imagery</i></h1>
<img WIDTH="100%" HEIGHT="4" SRC="http://cruisenews.net/images/redline.gif">
<p>

<table width="95%" bgcolor="white" align=center>

<tr>
<td  colspan=3>
<?php

///////////////////////////
// adsense ////////
///////////////////////////

include "/home/cruisenews/inc/adsense.inc";
?>
</td>
</tr>
<tr>
<td></td>
<td valign=top>

<p>
</td>
<td>
</td>

<tr>
<td width=140 valign=top rowspan=1000>
<?php

////////////////////////////////
// GUIDEDIR ////////
////////////////////////////////

include "/home/cruisenews/inc/guidedir.inc";
?>
</td>

<?php

///////////////////////////
// connection /////////////
///////////////////////////

include "/home/cruisenews/common_db.php";
$link_id = db_connect();
if(!$link_id) die(sql_error());

/*
	+-----------------------------------------------------------+
	  get site id's for each category
	+-----------------------------------------------------------+
	*/

	$site_cat_query = "SELECT site_id FROM Site_Categories WHERE cat_id = '52' ORDER BY site_rating";
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
			echo "<tr><td width=\"40%\"><a target=\"_blank\" href=\"$site_array[1]\"><b>$site_array[2]</b></a></td>";
			echo "<td align=\"left\"><i>$site_array[3]</i></td></tr>\n";
		}
	}


?>

<td colspan=2>

<p>
</td>
</tr>
</table>

<table width="95%" bgcolor="white" align=center>
<tr>
<td align=center>

<hr>
<?php

/////////////////////////////
// siteindex ////////
////////////////////////////

include "/home/cruisenews/inc/siteindex.inc";
?>

</h5>
</td>
</tr>
<tr>
<td>
<hr>
</td>
</tr>
</table>
<p>
</BODY>
</HTML>
