<HTML>
<HEAD><TITLE>EDIT SEARCH</TITLE></HEAD>
<BODY>

<?php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

echo "<FORM METHOD=\"GET\" ACTION=\"edit_search2.php\">\n";
echo "Single Word Search:\n";
echo "<p>\n";
echo "<INPUT NAME=\"search_term\" TYPE=\"TEXT\" maxlength=255>\n";
echo "<p>\n";
echo "<INPUT TYPE = SUBMIT>";
echo "</FORM>";

echo "<p><hr><p><a href=\"index.html\">Cruisenews Admin Index</a>";
?>

</BODY></HTML>