<?php
$url = "http://cruisenews.net/index.php";
$search_term = "sail";

function check_for_match($url, $search_term){
$html = file_get_contents($url);
$pos = strpos($html, $search_term);
$match = 0;
  if ($pos > 0){
    $match = 1;
    $start_context = $pos - 40;
    $strip_tags = strip_tags($html);
    $whitespace_start = strstr($strip_tags, " ");
    $trim_whitespace = trim($whitespace_start);
    $Ltrim = Ltrim($trim_whitespace);
    $rtrim = rtrim($Ltrim);
    $context = Substr($rtrim, $start_context, 400);
  }
return $context;
}

echo check_for_match($url, $search_term);

?>