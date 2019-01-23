<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">

<HTML>

<HEAD>
<TITLE>Guide to Sailing and Cruising Stories - Voyage Logs</TITLE>
<META NAME="description" CONTENT="Links to sailing and cruising stories, passagemaking, ocean voyages, bluewater yacht sailing adventure travel">
<META NAME="keywords" CONTENT="sailing,cruising,yacht,sail,ocean,boats,bluewater,passagemaking,voyage,adventure,travel,cruise,links">
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
<h1><i>Voyage Logs</i></h1>
<p>
<IMG WIDTH="100%" HEIGHT="4" SRC="http://cruisenews.net/images/redline.gif">
<BR CLEAR=LEFT>
</td>
</tr>
</table>

<table bgcolor="white" border=0 width="95%" align="center" cellpadding=4>
<tr>
<td colspan=4>

<?php

$logfile="/home/cruisenews/inc/pphlogger.inc";

if(file_exists($logfile))
{
	include "$logfile";
}

///////////////////////////
// adsense ////////
///////////////////////////

//include "/home/cruisenews/inc/adsense.inc";

echo "

<a href=\"http://www.myboatplans.com/cb?cb=cns3884\"><img src=\"http://www.myboatplans.com/images/banners/468x60-3.jpg\" border=0 alt=\"MyBoatPlans\"></a>

</td>\n
</tr>\n";

echo "<tr><td width=140 valign=top rowspan=1000>\n";

////////////////////////////////
// GUIDEDIR ////////
////////////////////////////////

include "/home/cruisenews/inc/guidedir.inc";

echo "</td></tr>\n"; 

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

$site_query = "SELECT Sites.site_id, site_url, site_name, site_comment FROM Sites, Site_Categories WHERE Site_Categories.cat_id = 1 and Sites.site_id = Site_Categories.site_id and site_atsea = \"FALSE\"  ORDER BY Site_Categories.site_rating";
$site_result = mysql_query($site_query) or die(sql_error());

while($site_array = mysql_fetch_row($site_result))
{
	$area_query = "SELECT site_area FROM Site_Area WHERE site_id = \"$site_array[0]\"";
	$area_result = mysql_query($area_query) or die(sql_error());
	if($area_result){$area_array = mysql_fetch_row($area_result) or die(sql_error());}

	$owner_query = "SELECT site_firstname, site_lastname FROM Site_Owners WHERE site_id = \"$site_array[0]\"";
	$owner_result = mysql_query($owner_query) or die(sql_error());
	if($owner_result) {$owner_array = mysql_fetch_row($owner_result) or die(sql_error());}

	echo "<tr align=left valign=center><td><a target=\"_blank\" href=\"http://cruisenews.net/db/page.php?site_id=$site_array[0]\"><h3>$site_array[2]</h3></a></td>";
	echo "<td>$owner_array[0]  $owner_array[1]</td>";
	echo "<td><i>$site_array[3]</i></td>";
	echo "<td>$area_array[0]</td>\n";
}

?>
</table>

<table width="95%" bgcolor=white align=center>
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



