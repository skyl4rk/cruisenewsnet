<?php
$url = "http://cruisenews.net/index.php";

function get_title($url){
  $contents = file_get_contents($url, 5000);
  preg_match('/<title>([^>]*)<\/title>/si', $contents, $match );
  return "$match[1]";
}

echo get_title($url);
?>