<?php
$url ="http://hudzilla.org/phpwiki/index.php?title=Main_Page";
$search_term = "bahamas";
$html = file_get_contents($url);
echo stripTags(stripLargeTags($html));


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
