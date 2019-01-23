<?php
//db_connect.php

include "/home/cruisenews/www/inc/db_connect.php";
error_reporting(0);


if(!$link_id) die(sql_error());
else echo "Sucessful inclusion of www/inc/db_connect.php .<BR>";
?>
