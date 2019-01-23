<HTML>
<HEAD><TITLE>Update Static HTML Pages</TITLE></HEAD>
<BODY>

<?php

echo "<a href=\"index.html\">Cruisenews Admin Index</a><p>\n";

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());
if ($link_id) {echo "Connected<p>\n";}

function shipsatseaupdate()
{
	$sourcepage = "http://cruisenews.net/db/shipsatsea.php";
	$targetfilename = "/home2/www/cruisenews/shipsatsea.html";
	$dynamic_source = fopen("$sourcepage", "r");
	if (!$dynamic_source) 
	{
		echo "<strong>Unable to load $sourcepage
		- Static page! Update Failed!</strong>";
		exit(); 
	}
	$tempfilename = "temp_file.html"; 
	$htmldata = fread($dynamic_source, 1024*1024);
	fclose($dynamic_source);
	$tempfile = fopen($tempfilename, 'w');
	if (!$tempfile) 
	{
		echo"<strong>Unable to open temporary file $tempfilename for writing! Static page update aborted!</strong>";
		exit();
	}
	fwrite($tempfile, $htmldata);
	fclose($tempfile);
	copy($tempfilename, $targetfilename);
	unlink($tempfilename);
	echo "<p><strong>$targetfilename Static HTML Updated!</strong>";
}

function voyagelogsupdate()
{
	$sourcepage = "http://cruisenews.net/db/voyagelogs.php";
	$targetfilename = "/home2/www/cruisenews/voyagelogs.html";
	$dynamic_source = fopen("$sourcepage", "r");
	if (!$dynamic_source) 
	{
		echo "<strong>Unable to load $sourcepage
		- Static page! Update Failed!</strong>";
		exit(); 
	}
	$tempfilename = "temp_file.html"; 
	$htmldata = fread($dynamic_source, 1024*1024);
	fclose($dynamic_source);
	$tempfile = fopen($tempfilename, 'w');
	if (!$tempfile) 
	{
		echo"<strong>Unable to open temporary file $tempfilename for writing! Static page update aborted!</strong>";
		exit();
	}
	fwrite($tempfile, $htmldata);
	fclose($tempfile);
	copy($tempfilename, $targetfilename);
	unlink($tempfilename);
	echo "<p><strong>$targetfilename Static HTML Updated!</strong>";
}

function seamanshipupdate()
{
	$sourcepage = "http://cruisenews.net/db/seamanship.php";
	$targetfilename = "/home2/www/cruisenews/seamanship.html";
	$dynamic_source = fopen("$sourcepage", "r");
	if (!$dynamic_source) 
	{
		echo "<strong>Unable to load $sourcepage
		- Static page! Update Failed!</strong>";
		exit(); 
	}
	$tempfilename = "temp_file.html"; 
	$htmldata = fread($dynamic_source, 1024*1024);
	fclose($dynamic_source);
	$tempfile = fopen($tempfilename, 'w');
	if (!$tempfile) 
	{
		echo"<strong>Unable to open temporary file $tempfilename for writing! Static page update aborted!</strong>";
		exit();
	}
	fwrite($tempfile, $htmldata);
	fclose($tempfile);
	copy($tempfilename, $targetfilename);
	unlink($tempfilename);
	echo "<p><strong>$targetfilename Static HTML Updated!</strong>";
}

function equipmentupdate()
{
	$sourcepage = "http://cruisenews.net/db/equipment.php";
	$targetfilename = "/home2/www/cruisenews/equipment.html";
	$dynamic_source = fopen("$sourcepage", "r");
	if (!$dynamic_source) 
	{
		echo "<strong>Unable to load $sourcepage
		- Static page! Update Failed!</strong>";
		exit(); 
	}
	$tempfilename = "temp_file.html"; 
	$htmldata = fread($dynamic_source, 1024*1024);
	fclose($dynamic_source);
	$tempfile = fopen($tempfilename, 'w');
	if (!$tempfile) 
	{
		echo"<strong>Unable to open temporary file $tempfilename for writing! Static page update aborted!</strong>";
		exit();
	}
	fwrite($tempfile, $htmldata);
	fclose($tempfile);
	copy($tempfilename, $targetfilename);
	unlink($tempfilename);
	echo "<p><strong>$targetfilename Static HTML Updated!</strong>";
}

function boatbuildingupdate()
{
	$sourcepage = "http://cruisenews.net/db/boatbuilding.php";
	$targetfilename = "/home2/www/cruisenews/boatbuilding.html";
	$dynamic_source = fopen("$sourcepage", "r");
	if (!$dynamic_source) 
	{
		echo "<strong>Unable to load $sourcepage
		- Static page! Update Failed!</strong>";
		exit(); 
	}
	$tempfilename = "temp_file.html"; 
	$htmldata = fread($dynamic_source, 1024*1024);
	fclose($dynamic_source);
	$tempfile = fopen($tempfilename, 'w');
	if (!$tempfile) 
	{
		echo"<strong>Unable to open temporary file $tempfilename for writing! Static page update aborted!</strong>";
		exit();
	}
	fwrite($tempfile, $htmldata);
	fclose($tempfile);
	copy($tempfilename, $targetfilename);
	unlink($tempfilename);
	echo "<p><strong>$targetfilename Static HTML Updated!</strong>";
}


function resourcesupdate()
{
	$sourcepage = "http://cruisenews.net/db/resources.php";
	$targetfilename = "/home2/www/cruisenews/media.html";
	$dynamic_source = fopen("$sourcepage", "r");
	if (!$dynamic_source) 
	{
		echo "<strong>Unable to load $sourcepage
		- Static page! Update Failed!</strong>";
		exit(); 
	}
	$tempfilename = "temp_file.html"; 
	$htmldata = fread($dynamic_source, 1024*1024);
	fclose($dynamic_source);
	$tempfile = fopen($tempfilename, 'w');
	if (!$tempfile) 
	{
		echo"<strong>Unable to open temporary file $tempfilename for writing! Static page update aborted!</strong>";
		exit();
	}
	fwrite($tempfile, $htmldata);
	fclose($tempfile);
	copy($tempfilename, $targetfilename);
	unlink($tempfilename);
	echo "<p><strong>$targetfilename Static HTML Updated!</strong>";
}


function boattypesupdate()
{
	$sourcepage = "http://cruisenews.net/db/boattypes.php";
	$targetfilename = "/home2/www/cruisenews/boattypes.html";
	$dynamic_source = fopen("$sourcepage", "r");
	if (!$dynamic_source) 
	{
		echo "<strong>Unable to load $sourcepage
		- Static page! Update Failed!</strong>";
		exit(); 
	}
	$tempfilename = "temp_file.html"; 
	$htmldata = fread($dynamic_source, 1024*1024);
	fclose($dynamic_source);
	$tempfile = fopen($tempfilename, 'w');
	if (!$tempfile) 
	{
		echo"<strong>Unable to open temporary file $tempfilename for writing! Static page update aborted!</strong>";
		exit();
	}
	fwrite($tempfile, $htmldata);
	fclose($tempfile);
	copy($tempfilename, $targetfilename);
	unlink($tempfilename);
	echo "<p><strong>$targetfilename Static HTML Updated!</strong>";
}


function discoveriesupdate()
{
	$sourcepage = "http://cruisenews.net/db/discoveries.php";
	$targetfilename = "/home2/www/cruisenews/discoveries.html";
	$dynamic_source = fopen("$sourcepage", "r");
	if (!$dynamic_source) 
	{
		echo "<strong>Unable to load $sourcepage
		- Static page! Update Failed!</strong>";
		exit(); 
	}
	$tempfilename = "temp_file.html"; 
	$htmldata = fread($dynamic_source, 1024*1024);
	fclose($dynamic_source);
	$tempfile = fopen($tempfilename, 'w');
	if (!$tempfile) 
	{
		echo"<strong>Unable to open temporary file $tempfilename for writing! Static page update aborted!</strong>";
		exit();
	}
	fwrite($tempfile, $htmldata);
	fclose($tempfile);
	copy($tempfilename, $targetfilename);
	unlink($tempfilename);
	echo "<p><strong>$targetfilename Static HTML Updated!</strong>";
}

function booksupdate()
{
	$sourcepage = "http://cruisenews.net/db/books.php";
	$targetfilename = "/home2/www/cruisenews/books.html";
	$dynamic_source = fopen("$sourcepage", "r");
	if (!$dynamic_source) 
	{
		echo "<strong>Unable to load $sourcepage
		- Static page! Update Failed!</strong>";
		exit(); 
	}
	$tempfilename = "temp_file.html"; 
	$htmldata = fread($dynamic_source, 1024*1024);
	fclose($dynamic_source);
	$tempfile = fopen($tempfilename, 'w');
	if (!$tempfile) 
	{
		echo"<strong>Unable to open temporary file $tempfilename for writing! Static page update aborted!</strong>";
		exit();
	}
	fwrite($tempfile, $htmldata);
	fclose($tempfile);
	copy($tempfilename, $targetfilename);
	unlink($tempfilename);
	echo "<p><strong>$targetfilename Static HTML Updated!</strong>";
}

////////////////
// SET FUNCTIONS
////////////////
//DISABLED!
//shipsatseaupdate();
//voyagelogsupdate();
//seamanshipupdate();
//equipmentupdate();
//boatbuildingupdate();
//resourcesupdate();
//boattypesupdate();
//discoveriesupdate();
//booksupdate();
?>
<p><a href="update.php">Update Static HTML</a><p>

</BODY>
</HTML>
