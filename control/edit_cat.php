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


$result = mysql_query("SELECT * FROM Categories WHERE cat_name='$edit_line'") or die(sql_error());

echo "<FORM METHOD=POST ACTION=\"edit_cat2.php\">";

echo "<br><INPUT NAME=insert_value TYPE=\"TEXT\" VALUE= $edit_line>";
echo "<INPUT TYPE=HIDDEN NAME=table VALUE='Categories'>";
echo "<INPUT TYPE=HIDDEN NAME=fieldname VALUE='cat_name'>";
echo "<INPUT TYPE=HIDDEN NAME=edit_line VALUE='$edit_line'>";

echo "<INPUT TYPE=\"SUBMIT\"></FORM>";

echo "<p><hr><p><a href=\"add_cat.php\">Add another category</a><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";

?>

</BODY></HTML>
