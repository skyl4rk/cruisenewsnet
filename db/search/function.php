<html><head><title>Results</title></head><body>
<?php
set_time_limit(0);
$search_term=$HTTP_GET_VARS['search_term'];
echo "<h2>$search_term</h2>";

//-------------------------------

function check_urls ($subject_url){
  $bad_url = 0;
  echo "<br>* Check $val[0] for bad urls<br>";
  foreach ($banned_ext as $extension){
    $test_url = preg_match($extension, $val[0]);
    if ($test_url == 1){
      $bad_url = 1;
      echo "* Bad url found.<br>";
    }
  }  
return $bad_url;
}

function search_and_print_matches ($subject_url, $search_term){
  $html = file_get_contents($subject_url, 5000);
  if(!($fp = fopen("./temp.txt", "w"))) die ("Cannot open file");
  fwrite($fp, strip_tags($html));
  if(!($temp_handle = fopen("./temp.txt", "r"))) die ("Cannot open file");
  $temp_text = fread($temp_handle, 5000);
  $test = preg_match_all("'$search_term'", $temp_text, $matches, PREG_OFFSET_CAPTURE);

  // process temp.txt if there are matches

  if ($test > 0){
    echo "There is a search term match!<br>";
    $start_point = ($matches[0][0][1])-40;
    fseek($temp_handle, $start_point);
    $context = fread($temp_handle, 400);
    $context_trimmed = Ltrim($context);
    $emphasize_search_term = str_replace($search_term, $bold, $context_trimmed);
    $whitespace_start = strstr($emphasize_search_term, " ");
    $trim_whitespace = trim($whitespace_start);
    $result = $trim_whitespace;
 
    // print results to screen

    echo "<p><b>Search term match in listed site:<br><a href=\"$site_array[1]\">$site_array[2]</a></b> $site_array[3]<br><small>...";
    echo $result;
    echo "</small><p>";
    $test = 0;
  }
  return;
}

$banned_ext = array
(
    "'.dtd'",
    "'.css'",
    "'.xml'",
    "'.js'",
    "'.gif'",
    "'.jpg'",
    "'.jpeg'",
    "'.bmp'",
    "'.ico'",
    "'.rss'",
    "'blog'",
    "'sitering'",
    "'forum'",
    "'.swf'",
    "'.flv'"
);

// connect to database

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

// TOP LEVEL SEED get all Site data records
//-----------------------------------------

$site_query = "SELECT site_id, site_url, site_name, site_comment FROM Sites ORDER BY entry_date DESC";
$site_result = mysql_query($site_query) or die(sql_error());

// loop through Site data records

while($site_array = mysql_fetch_row($site_result)){
  search_and_print_matches($site_array[1], $search_term);
}
$html = file_get_contents($subject_url);

    //	scan file for internal urls

    preg_match_all("/http:\/\/[^\"\s']+/", $html, $matches, PREG_SET_ORDER);

    // SECOND LEVEL URLS
    //------------------------
    //	iterate through each internal_url
    //  CHECK FOR BAD URLS

    foreach ($matches as $val){
check_urls($val[0]);
}
?>