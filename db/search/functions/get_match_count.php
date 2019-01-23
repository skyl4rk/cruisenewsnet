<?php
$html = "http:// cruisenews.net / index . php ";
$search_term = "index";

function get_match_count($html,$search_term){
  $count = substr_count($html, $search_term);

  return "$count";
}

echo get_match_count($html, $search_term);
?>