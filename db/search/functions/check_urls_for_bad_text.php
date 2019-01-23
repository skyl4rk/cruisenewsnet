<html><head><title>Check URL</title></head><body>
<?php
$url = "http://cruisenews.net/boat.gif";

echo "<h2>$check_url</h2>";

//------check_urls for banned text------------------------->
// returns 1 if banned text is found in url


function check_url($url){
  $banned_text = array ("'.dtd'","'.css'","'.xml'","'.js'","'.gif'","'.jpg'","'.jpeg'","'.bmp'","'.ico'","'.rss'","'blog'","'sitering'","'forum'","'.swf'","'.flv'");
  $bad_url = 0;
//  echo "<br>Check $url for bad urls<br>";
  foreach ($banned_text as $text){
    $test_url = preg_match($text, $url);
    if ($test_url == 1){
      $bad_url = 1;
//      echo "Bad url found.<br>";
    }
  }  
return $bad_url;
}

//-------dynamic script------------------->

echo "\$bad_url -> " . check_url($url) ;

?>