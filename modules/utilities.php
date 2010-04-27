<?php
function __mediapath($entity,$url,$image){
	return "images/media/$entity/$url/".$image;
}

function __reduce($text,$size,$follow=""){
	return substr($text,0,$size).$follow;
}
/**
 * generate a link to the <code>entity</code> to te <code>url</code>
 * @param $entity name of the entity
 * @param $url shortname to access entity
 */
function __linkto($entity,$action,$label="",$title="",$accesskey=""){
    if($label!=""){
        return "<a href=\"".__linkto($entity,$action)."\"".
           ($title!=""?" title=\"".$title."\"":"")."\"".
           ($accesskey!=""?" accesskey=\"$accesskey\"":"").
           "class=\"read\">".
           $label."</a>";
    }else{
	    return (__isActive('system','rewrite')?"":"?")."$entity/$action";
    }
}

/**
 * 
 * @param $entity
 * @param $url
 * @param $group
 * @param $label
 * @param $title
 * @return HTML string for this link href tag.
 */
function __slinkto($entity,$url,$group,$label,$title=""){
    return "<a href=\"".__linkto($entity,$url)."\"".
           " ".($title!=""?"title=\"".__($group,$title)."\"":"")."\" class=\"read\">".
           __($group,$label)."</a>";
}

?>

