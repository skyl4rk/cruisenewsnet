<HTML>
<HEAD></HEAD>
<BODY>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());
if($link_id) {echo "Connected<p>";}
echo "$edit_line <p>";


$result = mysql_query("SELECT * FROM Site_Arealist WHERE site_arealist='$edit_line'") or die(sql_error());
//$query = "SELECT * FROM Site_Arealist WHERE site_arealist='Bahamas'";
//$result = mysql_query('$query') or die(sql_error());


echo "<FORM METHOD=POST ACTION=\"edit_area2.php\">";

echo "<br><INPUT NAME=insert_value TYPE=\"TEXT\" VALUE= $edit_line>";
echo "<INPUT TYPE=HIDDEN NAME=table VALUE='Site_Arealist'>";
echo "<INPUT TYPE=HIDDEN NAME=fieldname VALUE='site_arealist'>";
echo "<INPUT TYPE=HIDDEN NAME=edit_line VALUE='$edit_line'>";

echo "<INPUT TYPE=\"SUBMIT\"></FORM>";

echo "<p><hr><p><a href=\"add_area.php\">Add another area?</a><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";

?>

</BODY></HTML>
