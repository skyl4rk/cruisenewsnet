<?php
$url = "http://cruisenews.net/index.php";

function get_description($url){
  $contents = file_get_contents($url, 5000);
  if (eregi ("<meta name=\"description\" content=[^>]*", $contents, $descresult)) {
    $description = explode("<meta name=\"description\" content=", $descresult[0]);
  }
return "$description[1]";
}

echo get_description($url);
?>