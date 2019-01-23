<HTML>
<HEAD><TITLE>YACHT CHARTER EDIT REGION</TITLE></HEAD>
<BODY>
<h2>Edit Yacht Charter Region</h2>
<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());
//if($link_id) {echo "Connected<p>";}
echo "$edit_line <p>";


$result = mysql_query("SELECT * FROM ycregion WHERE region='$edit_line'") or die(sql_error());

echo "<FORM METHOD=POST ACTION=\"yc_edit_region2.php\">";

echo "<br><INPUT NAME=insert_value TYPE=\"TEXT\" VALUE= $edit_line>";
echo "<INPUT TYPE=HIDDEN NAME=table VALUE='ycregion'>";
echo "<INPUT TYPE=HIDDEN NAME=fieldname VALUE='id'>";
echo "<INPUT TYPE=HIDDEN NAME=edit_line VALUE='$edit_line'>";

echo "<INPUT TYPE=\"SUBMIT\"></FORM>";

echo "<p><hr><p><a href=\"yc_add_region.php\">Add or edit another YC Region?</a><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";

?>

</BODY></HTML>
