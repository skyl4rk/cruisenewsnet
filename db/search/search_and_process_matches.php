<html><head><title>Results</title></head><body>
<?php
$url = "http://cruisenews.net/index.php";
$search_term = "sail";

$html = file_get_contents($url);
$pos = strpos($html, $search_term);
  if ($pos > 0){

    $start_context = $pos - 40;
    $strip_tags = strip_tags($html);
    $whitespace_start = strstr($strip_tags, " ");
    $trim_whitespace = trim($whitespace_start);
    $Ltrim = Ltrim($trim_whitespace);
    $rtrim = rtrim($Ltrim);
    $context = Substr($rtrim, $start_context, 400);
    $string_pos = 0;
    echo "<p><b>Search term match in listed site:<br><a href=\"$url\">$url</a></b><br><small>...";
    echo $context;
    echo "</small><p>";
}
$pos = 0;

/*

//------------------------------->
// given a url and the search term, prints text matches to screen

function search_and_print_matches ($url, $search_term){
  $position = 0;
  $html = strip_tags(file_get_contents($url, NULL, NULL, NULL, 5000));
  $position = strpos($html, $search_term);
echo $position;
  if ($position > 0){
echo "<p>in if loop<p>";
    $start_context = $position - 40;
    $context = Substr($html, $start_context, 400);
    $string_pos = 0;
    echo "<p><b>Search term match in listed site:<br><a href=\"$url\">$url</a></b><br><small>...";
    echo $context;
    echo "</small><p>";
//    $test = 0;
  }
  $position = 0;
  return $context;
}

search_and_print_matches($url, $search_term);

*/
?>