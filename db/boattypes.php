<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">

<HTML>

<HEAD>
<TITLE>Guide to Sailing and Cruising Stories - Offshore and Coastal Cruising Sailboats</TITLE>
<META NAME="description" CONTENT="Links to sailing and cruising stories, passagemaking, ocean voyages, bluewater yacht sailing adventure travel">
<META NAME="keywords" CONTENT="sailing,cruising,yacht,sail,ocean,boats,bluewater,passagemaking,voyage,adventure,travel,cruise,links">
<link type="text/css" rel="stylesheet" href="http://cruisenews.net/style.css">
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17085653-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</HEAD>
<BODY BGCOLOR="#ffffe8" TEXT="#000000" LINK="#ff0000" VLINK="#0000ff" ALINK="#03fcf5" BACKGROUND="http://cruisenews.net/images/naut14.jpg">
<a name="top">
<font face="verdana"> <B>

<table width="95%" align=center>
<tr align=left>
<td>
<a href="/" BORDER="0"><IMG SRC="/images/a30-543.gif" WIDTH="208" HEIGHT="266" BORDER="0" ALIGN="top" ALT="BACK TO HOME PORT"></A>
<h1>Guide to Sailing and Cruising Stories</h1>
<P>
<IMG WIDTH="100%" HEIGHT="4" SRC="http://cruisenews.net/images/redline.gif">
<P>
<h1><i>Offshore and Coastal Cruising Sailboats</i></h1>
<p>
<IMG WIDTH="100%" HEIGHT="4" SRC="http://cruisenews.net/images/redline.gif">
<BR CLEAR=LEFT>
</td>
</tr>
<tr>
<td bgcolor=white>

<?php

///////////////////////////
// adsense ////////
///////////////////////////
//include "/home/cruisenews/inc/adsense.inc";

echo "

<a href=\"http://www.myboatplans.com/cb?cb=cns3884\"><img src=\"http://www.myboatplans.com/images/banners/468x60-3.jpg\" border=0 alt=\"MyBoatPlans\"></a>

</td>
</tr>
</table>
<p>";

echo "<p><h2>Affordable Cruising Sailboats</h2>\n
Offshore and Sturdy Coastal Cruisers available on the North American used boat market for under $20,000.<BR>\n
<table width=\"95%\" align=center>
<tr>
<td>
<a href=\"http://www.alberg30.org/\"><IMG SRC=\"http://cruisenews.net/images/A30lines.gif\" WIDTH=290 HEIGHT=89 BORDER=0 ALIGN=Top></a>\n
</td>
</tr>\n
</table>\n
<BR>\n
<table  bgcolor=\"white\">\n
<tr><td width=160  bgcolor=\"white\" valign=top rowspan=1000>";

////////////////////////////////
// GUIDEDIR ////////
////////////////////////////////

include "/home/cruisenews/inc/guidedir.inc";

//echo "</td><td height=1></td><td height=1></td>\n";

//echo "<td align=right valign=top rowspan=1000>\n";

/////////////////////////////////
// ADSENSE //////////////////////
/////////////////////////////////

echo "<p><script type=\"text/javascript\"><!--
google_ad_client = \"pub-0460282711081659\";
/* cruisenews 120x600, created 6/20/10 */
google_ad_slot = \"5475854029\";
google_ad_width = 120;
google_ad_height = 600;
//-->
</script>
<script type=\"text/javascript\"
src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">
</script></td>\n
<td>"; 


///////////////////////////
// connection /////////////
///////////////////////////

include "/home/cruisenews/common_db.php";
$link_id = db_connect();
if(!$link_id) die(sql_error());


//////////////////////////////////////////
// get category id's for page //
//////////////////////////////////////////

$page_id = 9;

$cat_id_query = "SELECT cat_id FROM Page_Cat WHERE page_id = $page_id ORDER BY cat_order";
$cat_id_result = mysql_query($cat_id_query) or die(sql_error());

/*
+-----------------------------------------------------------+
  get category name for cat_id 
+-----------------------------------------------------------+
*/

while($cat_id_array = mysql_fetch_row($cat_id_result))
{
	$cat_name_query = "SELECT cat_name FROM Categories WHERE cat_id = '$cat_id_array[0]'";
	$cat_name_result = mysql_query($cat_name_query) or die(sql_error());
	$cat_name_array = mysql_fetch_row($cat_name_result) or die(sql_error());

	/*
	+-----------------------------------------------------------+
	  write category name
	+-----------------------------------------------------------+
	*/

	
	echo "<h2 id=\"$cat_name_array[0]\"> $cat_name_array[0] </h2>\n";

	
	/*
	+-----------------------------------------------------------+
	  get site id's for each category
	+-----------------------------------------------------------+
	*/

	$site_cat_query = "SELECT site_id FROM Site_Categories WHERE cat_id = '$cat_id_array[0]' ORDER BY site_rating";
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
			echo "<a target=\"_blank\" href=\"$site_array[1]\"><b>$site_array[2]</b></a>";
			echo " <i>$site_array[3]</i><br>\n";
		}
	}
}

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

echo "</table>";
?>
<p>
</BIG>
<b>Remember that the value of a boat is affected by the equipment that is included in the sale.  In particular, high priced equipment that you would purchase to bring the yacht to your standards should be taken into consideration when comparing boats:
<ul>
<li><b>Liferaft
<li><b>Windvane selfsteering
<li><b>Dinghy and outboard
<li><b>Anchors and rode
<li><b>Dodger, awning
<li><b>Cookstove, cabin heater
</ul>
<b>Necessary repairs and upgrades to the boat are also a major factor in the price.  Use the survey report to estimate the cost of repairs and upgrades that will be required immediately, and also estimate the cost of desired upgrades over the next few seasons.  Surveys are expensive, you need to be able to preselect boats by making your own inspection of the boat and various systems.  The following are just a few of the items which you should inspect as you compare the relative merits and values of different boats:
<ul>
<li><b>Motor repair or replacement
<li><b>Sails and running rigging condition
<li><b>Batteries, electrical equipment and system
<li><b>Water tankage and plumbing
<li><b>Standing rigging and mast
<li><b>Head and holding tank, pumpout system
<li><b>Pulpit, pushpit, lifelines, toerail
<li><b>Bilge pumps
<li><b>Hull integrity, fairness, finish, pox
<li><b>Hull to deck joint
<li><b>Deck core saturation
<li><b>Through-hull condition
<li><b>Portlight and hatch condition
<li><b>General interior cabinetry condition
<li><b>Bulkhead to hull adhesion
<li><b>Chainplate fastening and security
<li><b>Keel to hull joint and keelbolt condition
</ul>


<table width="95%" bgcolor=white align=center>
<tr><td>
<iframe align=center width="100%" height=800 title="Affordable Cruising Sailboat Forum" src="http://www.cruisenews.net/forum/viewforum.php?f=5"></iframe>
<p>
<a target="_blank" href="http://www.cruisenews.net/forum/viewforum.php?f=5"><h4>Click here to open the Cruising Sailor Affordable Cruising Sailboat Forum in a new page</h4></a></td>
<tr align=left>
<td>
<b>
<a target="_blank" href="http://www.alberg30.org/">Alberg 30</a> - profile courtesy of George Dunwiddie and the Alberg 30 site.
</td>
</tr>
<tr align=center>
<td>
<P>
<IMG SRC="http://cruisenews.net/images/redline.gif" WIDTH="100%" HEIGHT="4"">
<P>
<b><A HREF="/index.html">Back to Home Port</A>
<br><b><A HREF="/search.php">Search Cruisenews.net Database</A>
<p>
<!-- SiteSearch Google -->
<FORM method=GET action="http://www.google.com/search">
<TABLE bgcolor="#FFFFFF"><tr><td>
<A HREF="http://www.google.com/">
<IMG SRC="http://www.google.com/logos/Logo_40wht.gif" 
border="0" ALT="Google Site Search"></A>
</td>
<td>
<INPUT TYPE=text name=q size=31 maxlength=240 value="">
<INPUT type=submit name=btnG VALUE="Google Search">
<font size=-1>
<input type=hidden name=domains value="www.cruisenews.net"><br><input type=radio name=sitesearch value=""> Search the Web <input type=radio name=sitesearch value="www.cruisenews.net" checked> Search this site <br>
</font>
</td>
</tr>
</TABLE>
</FORM>
<P>
<IMG SRC="http://cruisenews.net/images/redline.gif" WIDTH="100%" HEIGHT="4">
</td>
</tr>
</table>

<table width="95%" bgcolor=white align=center>
<tr>
<td align=center>

<?php
/////////////////////////////
// siteindex ////////
////////////////////////////

include "/home/cruisenews/inc/siteindex.inc";
?>

</td>
</tr>
</table>
<hr>
<p>
</BODY>
</HTML>



