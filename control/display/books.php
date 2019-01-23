<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">

<HTML>

<HEAD>
<TITLE>Guide to Sailing and Cruising Stories - Sailing and Cruising Books</TITLE>
<META NAME="description" CONTENT="Links to sailing and cruising stories, passagemaking, ocean voyages, bluewater yacht sailing adventure travel">
<META NAME="keywords" CONTENT="sailing,cruising,yacht,sail,ocean,boats,bluewater,passagemaking,voyage,adventure,travel,cruise,links">
<link type="text/css" rel="stylesheet" href="http://cruisenews.net/style.css">
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
<h1><i>Sailing and Cruising Books</i></h1>
<p>
<IMG WIDTH="100%" HEIGHT="4" SRC="http://cruisenews.net/images/redline.gif">
<BR CLEAR=LEFT>
</td>
</tr>
<tr>
<td bgcolor=yellow>

<?php

///////////////////////////
// adsense ////////
///////////////////////////
include "/home/cruisenews/inc/adsense.inc";
?>

</td>
</tr>
</table>
<p>
<H2 id="online books">Online Books</H2>
<table bgcolor="yellow" border=0 width="95%" align="center"><tr align="left">
<td>
<UL>
<li><b><A TARGET="_blank" HREF="http://www.vt.edu/vt98/academics/books/dana/the_mast">Two Years Before the Mast</a>
<li><b><A TARGET="_blank" HREF="http://www.friend.ly.net/~dadadata/CC_Eric/aurora_contents.html">The Canoe Aurora</a>
<li><b><A TARGET="_blank" HREF="http://www.friend.ly.net/~dadadata/AA_Eric/alone_contents.html">Alone in the Caribbean</a>
<li><b><A TARGET="_blank" HREF="http://www.irbs.com/bowditch/">Bowditch - The American Practical Navigator</a>
<li><b><A TARGET="_blank" HREF="http://www.bibliomania.com/0/0/46/88/frameset.html">Treasure Island</A>
<li><b><A TARGET="_blank" HREF="http://www.rtpnet.org/robroy/books/rec/rs.html">Riddle of the Sands</A>
<li><b><a target="_blank" HREF="http://www.sangfroid.com/rime/">The Rime of the Ancient Mariner</A>
<li><b><A TARGET="_blank" HREF="http://www.friend.ly.net/~dadadata/BB_Eric/cruising_contents.html">Canoe Camping and Cruising</A>
<li><b><A TARGET="_blank" HREF="http://www.mcallen.lib.tx.us/books/circumna/ci_a.htm">The Circumnavigators</A>
<li><b><A TARGET="_blank" HREF="http://pollux.nss.nima.mil/pubs/pubs_j_apn_sections.html?rid=100">Bowditch - The American Practical Navigator, alternate</a>
<li><b><A TARGET="_blank" HREF="http://www.angelfire.com/va/lightson/mariner.html">The Rime of the Ancient Mariner</a>
<li><b><A TARGET="_blank" HREF="http://www.mcallen.lib.tx.us/books/seasecr/dseasec0.htm">Seamans Secrets</a>
<li><b><A TARGET="_blank" HREF="http://arthur-ransome.org/AR/literary/al.htm">The Cruise of the Alerte</a>
<li><b><A TARGET="_blank" HREF="http://arthur-ransome.org/AR/literary/knight.htm">Sailing</a>
<li><b><A TARGET="_blank" HREF="ftp://metalab.unc.edu/pub/docs/books/gutenberg/etext99/cpbld10.txt">Captain Blood</a>
<li><b><A TARGET="_blank" HREF="http://www.dragonflycanoe.com/stephens/">Canoe and Boatbuilding for Amateurs</a>
<li><b><a target="_blank" href="http://www.literature.org/authors/darwin-charles/the-voyage-of-the-beagle/">Voyage of the Beagle</a>
<li><b><A TARGET="_blank" HREF="http://www.rtpnet.org/robroy/books/rls/IV.HTM">An Inland Voyage</a>
<li><b><A TARGET="_blank" HREF="http://www.btinternet.com/~kidners/sesostris.html">Journal of a Voyage to the Cape of Good Hope</a>
<li><b><A TARGET="_blank" HREF="http://www.friend.ly.net/user-homepages/d/dadadata/smyth/mast_n_sail_notes.html">Mast and Sail in Europe and Asia</a>
<li><b><A TARGET="_blank" HREF="gopher://wiretap.spies.com/00/About/Releases/wrecker.txt">The Wrecker</a>
<li><b><A TARGET="_blank" HREF="http://www.marinecomposites.com/">Marine Composites</a>
</UL>
</td></tr></table>



<?php

///////////////////////////
// connection /////////////
///////////////////////////

include "/home/cruisenews/common_db.php";
$link_id = db_connect();
if(!$link_id) die(sql_error());


//////////////////////////////////////////
// get category id's for book page //
//////////////////////////////////////////

$cat_query = "SELECT * FROM Book_Cat WHERE ID > 0";
$cat_result = mysql_query($cat_query) or die(sql_error());

/*
+-----------------------------------------------------------+
  get category name for cat_id 
+-----------------------------------------------------------+
*/

while($cat_array = mysql_fetch_row($cat_result))
{
	
	/*
	+-----------------------------------------------------------+
	  write category name
	+-----------------------------------------------------------+
	*/

	
	echo "<h2 id=\"$cat_array[1]\"> $cat_array[1] </h2>\n";

	/*
	+-----------------------------------------------------------+
	  begin table
	+-----------------------------------------------------------+
	*/

	echo "<table bgcolor=\"yellow\" border=0 width=\"90%\" align=\"center\">";

	/*
	+-----------------------------------------------------------+
	  get site id's for each category
	+-----------------------------------------------------------+
	*/

	$book_query = "SELECT * FROM Books WHERE Category = '$cat_array[0]'";
	$book_result = mysql_query($book_query) or die(sql_error());

	/*
	+-----------------------------------------------------------+
	  get site information for each site id 
	+-----------------------------------------------------------+
	*/

	while($book_array = mysql_fetch_row($book_result))
	{


		/*
		+-----------------------------------------------------------+
		  loop and write site name link, comments
		+-----------------------------------------------------------+
		*/

			echo "<tr align=\"left\">

<td align=left> 

<a  href=\"http://cruisenews.net/control/edit_book2.php?edit_line=$book_array[7]\"><b>$book_array[2]</b></a> :: <a  href=\"http://cruisenews.net/control/edit_record2noifr.php?edit_line=$book_array[0]\"><i>no inline frame</i></a> :: <a target=\"_blank\" href=\"
http://www.amazon.com/exec/obidos/ASIN/$book_array[3]/guidetosailingan/
\"><b>Amazon</b></a><br>$book_array[1]

</td>";
}

	echo "</table>";
}

?>
<P><b>
<H3>
  My Favorites</H3>

<table bgcolor="white" border=0 width="95%" align="center"><tr align="left">
<td>
<b><A TARGET="_blank" HREF="http://www.amazon.com/exec/obidos/ASIN/0071580123/guidetosailingan">
<IMG SRC="http://cruisenews.net/books/Oceanconbudget.gif" WIDTH="90" HEIGHT="140" ALT="Anne Hammick, Ocean Cruising on a Budget" BORDER="0"></a> :: 

<b><A TARGET="_blank" HREF="http://www.amazon.com/exec/obidos/ASIN/0071580123/guidetosailingan">Ocean Cruising on a Budget</a>, Anne Hammick :: 
<br><b>
Many people who dream about voyaging with their own sailboat lose their dream as they wait to get enough funds together to actually buy a boat and the time to live aboard without an income.  This book describes how you can buy and refit an older, seaworthy sailboat, and how to budget your funds while underway.  Probably the most important lesson from this book is the basic equipment and skills required as a minimum for offshore travel by sailboat.  How much money do you need?  Figure US$ 10 to 20 thousand for initial boat purchase, the same amount again to bring the boat to seaworthy condition.  For your monthly budget, figure out how much you spend now on food and beverages, and add a little if you like to go out.  It will probably come out to between $500 and $2000 a month, depending upon your lifestyle.  
<p>Anne's book explains the most likely method for a cruiser on a budget to successfully break ties from land: through the purchase of a used, fiberglass monohull sailboat of about 30 feet in length.  Her focus is on sailing from the British Isles to the Carribbean, and other parts of the Atlantic.  The discussion includes what needs to be done to the typical "classic plastic" sailboat to make it ready for an Atlantic Crossing.  After reading this book, you will want to move on to other books which focus on the details of navigation, provisioning, maintenance, etc., but this book will give you an excellent overview and help you build your plan.
<P>
</td></tr></table>
<p>
<table bgcolor="white" border=0 width="95%" align="center"><tr align="left">
<td>
<b>
<b><A TARGET="_blank" HREF="http://www.amazon.com/exec/obidos/ASIN/0071580123/guidetosailingan">
<IMG SRC="http://cruisenews.net/books/VOASI.jpg" WIDTH="90" HEIGHT="140" ALT="Annie Hill, Voyaging on a Small Income" BORDER="0"></a> :: 
    <b><A TARGET="_blank" HREF="http://www.tillerbooks.com/vsi.htm">Voyaging on a Small Income</a>, Annie Hill :: <br>
<b>This book amazes me every time I read it.  Annie and Pete Hill have been able to live aboard, regularly voyaging in the Atlantic from Greenland to Venezuela, while working occassionally at low paying jobs.  They have been able to put enough money away to live off the interest from their savings bonds.  They built their own dory cruiser, which is set up beautifully for passagemaking and claim to enjoy the passage as much as the destination.  
<p>How did they do it?  By applying a rational decision making process to every expenditure they make (they pinch pennies to the max).  This book will tell you why the best foods for passagemaking are fresh fruits and vegetables, eggs, flour, pasta, beans and homemade bread.  How they heated their floating home while cruising the arctic.  Why an efficient galley may be your most important cost saving piece of equipment.  What type of ocean-cruising boat you can build and rig for a minimum of money.  After reading this book, I guarantee you will question why you are working and living as you are now.
<P>
</td></tr></table>
<p>
<table bgcolor="white" border=0 width="95%" align="center"><tr align="left">
<td>
<b><A TARGET="_blank" HREF="http://www.amazon.com/exec/obidos/ASIN/0964603675/guidetosailingan">
<IMG SRC="http://cruisenews.net/books/SelfSufficientSailor.gif" WIDTH="110" HEIGHT="140" ALT="Lin and Larry Pardey, Self Sufficient Sailor"
    BORDER="0"></a> :: 
<A TARGET="_blank" HREF="http://www.amazon.com/exec/obidos/ASIN/0964603675/guidetosailingan"><B>
Self-Sufficient Sailor</a>, Lin and Larry Pardey :: 
<br>
<b>
This book is a classic for those trying to understand what is so appealing about a cruising and voyaging lifestyle.  Lin and Larry Pardey introduced many people to the possibilities of crossing oceans on small boats and living a full time cruising life.  They are purists in the sense that they have no electrical system, no motor, no two-way radio, no holding tank, no aluminum mast, no modern fiberglass hull.  Just a traditional wooden hull, sail and kerosene lamps.  The Pardey's show how to live and sail well with a minimum of modern equipment.
</ul>
<p>
</td>
</tr>
</table>
<p>

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
<p>

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



