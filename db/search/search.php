<?php

$search_term = "bahamas";

include "/home/cruisenews/common_db.php";
error_reporting(0);
$link_id = db_connect();
if(!$link_id) die(sql_error());

$site_query = "SELECT Sites.site_id, site_url, site_name, site_comment FROM Sites, Site_Categories WHERE Site_Categories.cat_id = 1 and Sites.site_id = Site_Categories.site_id ORDER BY Site_Categories.site_rating";
$site_result = mysql_query($site_query) or die(sql_error());

// START VOYAGE LOG SEED LOOP

while($site_array = mysql_fetch_row($site_result))
{
$id = $site_array[0];
$url = $site_array[1];
$site_name = $site_array[2];
$site_comment = $site_array[3];

// GET CONTEXT, COUNT, TITLE, AND DESCRIPTION

$pos = 0;
$referrer = "alloutte";
$html = getPage($url, $referer, $timeout, $header);

//$html = file_get_contents($url);

$raw_text = stripTags(stripLargeTags($html));
$lraw_text = strtolower($raw_text);
$lsearch_term = strtolower($search_term);
$pos = strpos($lraw_text, $lsearch_term);
echo $url . "<br>";
  if ($pos > 0){
    $start_context = $pos - 40;
    $text_block = Substr($raw_text, $start_context, 400);
    $whitespace_start = strstr($text_block, " ");
    $trim_whitespace = trim($whitespace_start);
    $context = $trim_whitespace;    

    $count = substr_count($html, $search_term);
    preg_match('/<title>([^>]*)<\/title>/si', $html, $title );
    $title = $title[1];
    
    echo "<p>";
    echo "<a href=\"$url\">" . $title . "</a>";
    echo "<br>";
    echo $context;
    echo "<p>";

  }
/*    

    $Spidered_Urls_query = "INSERT INTO Spidered_Urls VALUES(NULL, '$url', '$title', '$description')";
    $Spidered_Urls_insert = mysql_query($Spidered_Urls_query) or die(sql_error());

    $Search_Terms_query = "INSERT INTO Search_Terms VALUES(NULL, '$search_term')";
    $result = mysql_query($Search_Terms_query) or die(sql_error());

    $Search_Term_Content_query = "INSERT INTO Search_Term_Content VALUES(NULL, '$url', '$search_term', '$context', '$count')";
    $result = mysql_query($Search_Term_Content_query) or die(sql_error());

*/


}
// -----------------------------------------------------------
function stripLargeTags($html){
    // Convert for RegExp
    $dropTags = implode("|",preg_split("/[^a-z]+/i",$dropTags));
    $searches = array (
        "/<!\[CDATA\[(.*)\]\]>/Usi", // Remove CData
        "/<script[^>]*>.*<\/script>/Usi", // Strip out javascript
        "/<style[^>]*>.*<\/style>/Usi", // Strip out styles
        "/<code[^>]*>.*<\/code>/Usi", // Strip out code chunks
        "/<!--(.*)-->/Us", // Strip comments
         "/<!.*>/Us", // Strip !Tags
    );
    $replace = array();
    foreach($searches as $search){
        array_push($replace, ''); // Replace all with ''
    } reset($search);
    $text = preg_replace($searches, $replace, $html);
    return $text;
}
// -----------------------------------------------------------
// -----------------------------------------------------------
function stripTags(
    $html, // The Html To strip
    $stripAttributes    =false,    // Strip Tag Attributes
    $keepTags            =false,    // Keep Html Tags
    $stripHtmlChars        =true,    // Strip Html Chars &*;
    $stripSpaces        =true,    // Replace Consecutive Spaces With Space
    $stripImages        =true,    // Replace Images With Alt Values
    $stripAcronyms        =true    // Replace Acronyms With Title Value
){
    //-- Separate Tags From Text
    $tags2Separate = "div|p|td|li|acronym|img";
    $tags2Separate = preg_split("/[^a-z]/i",$tags2Separate);
    $html = preg_replace("/<(\/?".implode("|",$tags2Separate).
        ")([^>]+)>/"," <\\1\\2>",$html
    );
    //-- Remove Images and Replace The With Their Alts
    if($stripImages){
        $html=preg_replace("/<img[^>]+?alt=\"([^\"]*)\"[^>]*>/si","\\1",$html);
    }
    //-- Remove Acronyms and Replace The With Their Titles
    if($stripAcronyms){
        $html=preg_replace("/<acronym.*title=\"([^\"]*)\"[^>]*>.*<\/acronym>/Ui","\\1",$html);
    }
    $text = stripLargeTags($html); // Change Params to keep <code>
    //-- Strip Regular Tags
    if($stripAttributes){
        $text = preg_replace("/<([^\s>]+)[^>]+\/>/i", "<\\1 />", $text);
        $text = preg_replace("@<([^\s>]+)[^>]+[^\/]>@si", "<\\1>", $text);
    }
    if(is_bool($keepTags)){
        if(!$keepTags){
            //-- We strip all the tags here
            $text = preg_replace("@<[^>]+>@si", "", $text);
        }
        //-- Otherwise we keep all the tags
    }else{
        if(is_string($keepTags)){
            $keepTags = preg_split("/[^a-z]/i",$keepTags);
        }
        if(is_array($keepTags)){
            if(preg_match_all("/<([^\/\s>]+)[^>]*>/si",$text,$tags)){
                //-- Tags Found in The Html
                $tags=$tags[1];
                $stripTags = array_diff($tags, $keepTags);
                $text=preg_replace("/<\/?(".implode("|",$stripTags).
                    ")(\s|)[^>]*>/","",$text
                );
            }
        }
    }
    //-- Remove Here Some WellKnow Html Chars
    $text=str_replace("&amp;","&",$text);
    //-- Trash all special characters
    if($stripHtmlChars){
        $text=preg_replace("/&[^\s;]+;/Ui"," ",$text);
    }
    //-- Strip all Consecutive Spaces
    if($stripSpaces){
        $text=str_replace("&nbsp;"," ",$text);
        $text=preg_replace("/[\t ]+/"," ",$text);
    }
    //-- Here you can continue to play with the output
    //-- And then return it
    return trim($text);
}
// -----------------------------------------------------------

function getPage($url, $referer, $timeout, $header){
    if(!isset($timeout))
        $timeout=30;
    $curl = curl_init();
    if(strstr($referer,"://")){
        curl_setopt ($curl, CURLOPT_REFERER, $referer);
    }
    curl_setopt ($curl, CURLOPT_URL, $url);
    curl_setopt ($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt ($curl, CURLOPT_USERAGENT, sprintf("Mozilla/%d.0",rand(4,5)));
    curl_setopt ($curl, CURLOPT_HEADER, (int)$header);
    curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
    $html = curl_exec ($curl);
    curl_close ($curl);
    return $html;
}


?>