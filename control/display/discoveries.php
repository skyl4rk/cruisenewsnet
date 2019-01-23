<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">

<HTML>

<HEAD>
<TITLE>Guide to Sailing and Cruising Stories - New Discoveries</TITLE>
<META NAME="description" CONTENT="Links to sailing and cruising stories, passagemaking, ocean voyages, bluewater yacht sailing adventure travel">
<META NAME="keywords" CONTENT="sailing,cruising,yacht,sail,ocean,boats,bluewater,passagemaking,voyage,adventure,travel,cruise,links">
</HEAD>
<BODY BGCOLOR="#ffffe8" TEXT="#000000" LINK="#ff0000" VLINK="#0000ff" ALINK="#03fcf5" BACKGROUND="http://cruisenews.net/images/naut14.jpg">

<font face="verdana">

<table width="95%" align=center>
<tr align=left>
<td>
<a href="index.htm" BORDER="0"><IMG SRC="/images/a30-543.gif" WIDTH="208" HEIGHT="266" BORDER="0" ALIGN="top" ALT="BACK TO HOME PORT"></A>
<h1>Guide to Sailing and Cruising Stories</h1>
<P>
<IMG WIDTH="100%" HEIGHT="4" SRC="http://cruisenews.net/images/redline.gif">
<P>
<h1><i>New Discoveries</i></h1>
<p>
<IMG WIDTH="100%" HEIGHT="4" SRC="http://cruisenews.net/images/redline.gif">
<BR CLEAR=LEFT>
</td>
</tr>
</table>

<table bgcolor="yellow" border=0 width="95%" align="center" cellpadding=4>
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

include "/home/cruisenews/inc/adsense.inc";
?>


<tr align="left"><th><b><i>Site Name</i></b></th><th><b><i>Category</i></b></th><th><b><i>Entry Date</i></b></th></i></tr>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

$site_query = "SELECT site_id, site_url, site_name, entry_date FROM Sites WHERE YEAR(entry_date) = 2006 OR YEAR(entry_date) = 2007  ORDER BY entry_date DESC";
$site_result = mysql_query($site_query) or die(sql_error());

while($site_array = mysql_fetch_row($site_result))
{
	$site_cat_query = "SELECT cat_id FROM Site_Categories WHERE site_id = \"$site_array[0]\"";
	$site_cat_result = mysql_query($site_cat_query) or die(sql_error());
	if($site_cat_result){$site_cat_array = mysql_fetch_row($site_cat_result) or die(sql_error());}

	$cat_query = "SELECT cat_name FROM Categories WHERE cat_id = \"$site_cat_array[0]\"";
	$cat_result = mysql_query($cat_query) or die(sql_error());
	if($cat_result){$cat_array = mysql_fetch_row($cat_result) or die(sql_error());}


	echo "<tr align=\"left\"><td>

<a  href=\"http://cruisenews.net/control/edit_record2.php?edit_line=$site_array[0]\"><b>$site_array[2]</b></a> :: <a  href=\"http://cruisenews.net/control/edit_record2noifr.php?edit_line=$site_array[0]\"><i>no inline frame</i></a></td>";


	echo "<td><b>$cat_array[0]</b></td>";
	echo "<td>$site_array[3]</td></tr>\n";
}

?>
</table>

<table width="95%" bgcolor=white align=center>
<tr align=left>
<tr>
<td>
<p>
<hr>
<p>
<b>
For many more links, see the 2003 <a target="_blank" href="http://cruisenews.net/discoveries2003.html">New Discoveries</a> page.
</td>
</tr>

<td>
<b>
<a target="_blank" href="http://www.alberg30.org/">Alberg 30</a> - profile courtesy of George Dunwiddie and the Alberg 30 site.
<P>
The Guide to Sailing and Cruising Stories is a collection of personal accounts by sail and motor boat cruisers. This site is dedicated to bringing you the best stories on sailing and cruising available on the internet. 
<p>
The Guide to Sailing and Cruising Stories focuses on personal accounts of bluewater ocean sailing voyages, coastal cruising, ocean passagemaking, exploring the wilderness by boat, living aboard, river voyages and adventure travel by boat around the world. The stories include a wealth of information on destinations, equipment, remarkable situations and general foolery for anyone interested in traveling in their own yacht or boat.
<p>
First hand cruising adventure accounts taken directly from the sailors' own personal pages make for the best information on sailing and cruising. 
<p>
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
</td></tr></TABLE>
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
<tr>
<td>

</td>
</tr>
</table>
<p>
</BODY>
</HTML>



