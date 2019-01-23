<?php
//add_url2.php

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());
if($link_id) {echo "Connected<p>";}

$query = "INSERT INTO Site_Arealist VALUES('$site_arealist')";
$result = mysql_query($query) or die(sql_error());
if($result) {echo "Added: " . $site_arealist . " to the list of Areas.";}

echo "<p><hr><p>";

$result=mysql_query("select site_arealist from Site_Arealist order by 'id'")or die(sql_error());
$num_fields = mysql_num_fields($result);
$j=0;
$x=1;
while($row=mysql_fetch_array($result)){  
for($j=0;$j<$num_fields;$j++){
  $name = mysql_field_name($result, $j);
  $object[$x][$name]=$row[$name];
 }$x++;
}

$i=1;
$ii=count($object);        //quick access function
for($i=1;$i<=$ii;$i++){
echo $object[$i][$name];
echo "<br>";
}



echo "<p><hr><p><a href=\"add_area.php\">Add or edit an area</a><p>";
echo "<a href=\"index.html\">Cruisenews Admin Index</a>";
?>


