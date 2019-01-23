<?php

$search_term = "bahamas";

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());


$url = "test";
$search_term = "goofus";
$title = "annie";
$description = "valentines day";
$context = "lotso text here sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";
$count = "6";


    
    $Spidered_Urls_query = "INSERT INTO Spidered_Urls VALUES(NULL, '$url', '$title', '$description')";
    $Spidered_Urls_insert = mysql_query($Spidered_Urls_query) or die(sql_error());

    $Search_Terms_query = "INSERT INTO Search_Terms VALUES(NULL, '$search_term')";
    $result = mysql_query($Search_Terms_query) or die(sql_error());

    $Search_Term_Content_query = "INSERT INTO Search_Term_Content VALUES(NULL, '$url', '$search_term', '$context', '$count')";
    $result = mysql_query($Search_Term_Content_query) or die(sql_error());
