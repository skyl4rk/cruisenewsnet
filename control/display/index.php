<!DOCTYPE html PUBLIC *-//W3C//DTD HTML 4.01 Transitional//EN*
	*http://www.w3.org/TR/htm14/loose.dtd">

<?php

//////////////////////////
// connection //
/////////////////////////

include "/home/cruisenews/common_db.php";
$link_id = db_connect();
if(!$link_id) die(sql_error());

echo "<html>\n
<head>\n
<meta name=\"description\" content=\"";

$descfile="/home/cruisenews/inc/desc/indexdesc.inc";

if(file_exists($descfile))
{
	include "$descfile";
}

echo "\">\n
<meta name=\"keywords\" content=\"";

$keyfile="/home/cruisenews/inc/key/indexkey.inc";
$sitefile="/home/cruisenews/inc/key/sitekey.inc";
if(file_exists($keyfile))
{
	include "$sitefile";
	include "$keyfile";
}

echo "\">\n
<title>Guide to Sailing and Cruising Stories</title>\n
<link type=\"text/css\" rel=\"stylesheet\" href=\"http://cruisenews.net/style.css\">\n
</head>\n
<body>\n

<a href=\"http://cruisenews.net/\" BORDER=\"0\"><img SRC=\"http://cruisenews.net/images/a30-543.gif\" WIDTH=\"208\" HEIGHT=\"266\" BORDER=\"0\" ALIGN=\"top\" ALT=\"BACK TO HOME PORT\"></a>\n
<h1>Guide to Sailing and Cruising Stories</h1>\n
<p>\n
<img WIDTH=\"100%\" HEIGHT=\"4\" SRC=\"http://cruisenews.net/images/redline.gif\">\n
<p>\n
<h1><i>Home Port</i></h1>\n
<img WIDTH=\"100%\" HEIGHT=\"4\" SRC=\"http://cruisenews.net/images/redline.gif\">\n
<p>\n
</td>\n
</tr>\n
</table>\n

<table width=\"95%\" bgcolor=\"yellow\" align=center cellpadding=4>\n
<tr>\n
<td rowspan=1000 width=160>\n";

////////////////////////////////
// GUIDEDIR ////////
////////////////////////////////

include "guidedir.inc";

echo "
</td></tr>\n"; 

$textfile="indextext.inc";

if(file_exists($textfile))
{
	echo "<tr><td>\n";
	include "$textfile";
	echo "</td><tr>";
}


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
<hr>
</td>
</tr>
</table>
</body>
</html>
