<?php

$cat_id=102;

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

$logfile="/home/cruisenews/inc/pphlogger.inc";

if(file_exists($logfile))
{
	include "$logfile";
}

echo "<table width=\"95%\" align=center>\n
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
<tr>
<td>
<h2>Amateur Radio Email Primer</h2>\n
<i>Definitions</i><p>\n
<b>Pactor - this is nothing more than a mode that uses both upper and lower case characters and teleprints\n over radio, using a code that is built in that gives 100% error free copy.  It is basically a combination of amtor\n (amateur teleprinting over radio) and packet.  Pactor uses acknowledge and not acknowledge codes that\n are built in.  Common modes are pactor I and pactor II.<p>\n
<b>tnc - this stands for terminal node controller.  Just think of it as a radio modem.<p>\n
<b>ptt - that is the term push to talk.  It is what makes your radio transmit.<p>\n
<b>rec audio - this is your receive signal that goes to your speaker after the radio does its magic<p>\n
\n
<b>transmit audio - when you talk in to your mike, you create transmit audio<p>\n
<b>ground - ground is ground the world around!!!! ( - pole on battery)<p>\n
<b>mike ground - usually shielded cable in some mike cords for shielding the transmit audio<p>\n
<b>software - the software that makes cruising e-mail work<p>\n
<b>ISP/radio e-mail provider - this is the station that you will use for the actual access in and out of the\n internet.<p>\n
\n
<b>\n
To tie all this together, you must have a well installed radio system\n
on your boat!!!  I cannot stress this more.  If you have ssb on your\n
boat and have trouble contacting stations or can not hear stations very\n
well, then you need to enhance your station.  The single most common\n
area of dismal performance is in your RF ground.  If you have a tuner\n
and think that a piece of ten guage wire from the tuner to the dynaplate\n
is sufficient, save your money and forget digital e-mail, it will simply\n
will frustrate you.  There is an excellent publication available from\n
ICOM and it is free, call their technical department and they will send\n
you a copy.  It covers the installation of a proper rf ground on your boat.  Of all the boats that I have visited th\nat have problems, a good rf ground solved the problem!
<p>\n
<b>You will need a computer that will run windows 95/98.  There still are\n
some stations that will work in dos but are getting rare.\n
<p><b>\n
The hookup!!!!!<a target=\"_blank\" href=\"http://www.phoenixcon.net/~pelago/index.html\"><img SRC=\"\n/images/pelago.jpg\" border=\"0\" height=\"242\" width=\"300\" align=\"right\"></a>\n
\n
<p>\n
<b>A COMPUTER, A TNC, A RADIO....<br>\n
<b>Your tnc will have an instruction manual.  There will be a cable or\n
a plug that will come with it.  You will need to hook up PTT, REC AUDIO,\n
GROUND, AND TRANSMIT AUDIO TO THE APPROPRIATE PINS ON THE CONNECTOR.  ALL OF\n THESE ARE CONNECTIONS TO YOUR RADIO!!!!\n
<p><b>\n
Once the tnc is connected to the radio, you will need to disconnect your\n
microphone, the software and the computer will control your radio and\n
the mike will be open when in the transmit mode and if the stereo is\n
on you will transmit whatever is playing on the stereo and i do not think\n
that you will want to do that!!!  There are some companies that make\n
a TNC/SWITCH that take all the work out of it.  One particular company\n
is called MFJ (find them in QST magazine and call them and give your radio make and type and tnc type) \n They can send you a plug and play switch!!!\n
<p><b>\n
Now hook up your computer to the tnc with a modem cable.  Install the software in the computer.  If you use \na program called AIRMAIL you are 99% done.  go to options page and fill in the blanks and you are finished.
<p><b>\n
Once your station is complete and all the bells and whistles are working you are ready to send and receive \ne-mail.  Find a station that you want to use and have at it.  There will be some trial and error stuff that can only be learned from experience, but one advantage that you will have is that you will also be able to receiv\ne NAVTEX (SITOR BROADCASTS FOR WEATHER)  and weather fax all with the same modem.
<p><b>\n
Rick, s/v Pelago\n
<p><b>\n
<a target=\"_blank\" href=\"http://winlink.org/k4cjx/\">Win-Link</a><br><b>\n
<a target=\"_blank\" href=\"http://www.airmail2000.com/index.htm\">Airmail Homepage</a>\n
\n
<p>\n
</tr>\n
</td>\n
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
