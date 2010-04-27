<?php
class I18n {
	private static $_instance = null;
	private static $_language = null;
	private static $_langkey  = "en_EN";
	private static $_themes = array();

	public function I18n(){
		self::$_langkey = Config::getInstance()->get("system","language");
		if(!isset(self::$_language) || self::$_language == null){
			self::$_language = parse_ini_file("i18n/".self::$_langkey."/main.properties",true);
			__debug("I18n::I18n() - path="."i18n/".self::$_langkey."/main.properties");
			__debug("messages=".print_r(self::$_language,true));
		}
	}
	
	public function addI18nTheme($themepath){
		
		/*if((self::$_themes)&&file_exists("templates/".$themepath."/i18n/".self::$_langkey."/main.properties")){
			$themeI18n = parse_ini_file("templates/".$themepath."/i18n/".self::$_langkey."/main.properties",true);
			self::$_language = array_merge(self::$_language,$themeI18n);
			echo "<pre>".print_r(self::$_language,true)."</pre>";
		}*/
	}

	/**
	 * return the message based on $group and $key identifiers.
	 * @param $group
	 * @param $key
	 */
	public function get($group,$key){
		__debug("I18n::get() - group=$group, key=$key");
		if(isset(self::$_language[$group]) && isset(self::$_language[$group][$key])){
			return self::$_language[$group][$key];
		}else{
			return "message not defined in ".self::$_langkey;
		}
	}

	/**
	 * return parameterized message based
	 * @param $group
	 * @param $key
	 */
	public function getS($group,$key,$args){
		__debug("I18n::getS() - group=$group, key=$key");
		$msg=self::get($group,$key);
        //$msg = mb_convert_encoding(self::get($group,$key),Config::getInstance()->get("system","encoding"));

		for($i=0;$i < count($args); $i++){
			$msg = str_replace("{".$i."}",$args[$i],$msg);
		}
		return $msg;
	}
    /**
     * return message cleaned from any html tags.
	 * @param $group
	 * @param $key
     */
	public function removeHtml($group,$key){
	    __debug("I18n::getS() - group=$group, key=$key");
		$msg=self::get($group,$key);
		return strip_tags($msg);
	}

	/**
	 * initialise language from config.ini file.
	 */
	public function getInstance(){
		__debug("I18n::getInstance()");
		if(!isset(self::$_instance) || self::$_instance == null){
			self::$_instance = new I18n();
		}
		return self::$_instance;
	}
}
function __($group,$key){
	return I18n::getInstance()->get($group,$key);
}
function __s($group,$key){
    $args = array_slice(func_get_args(),2);
	return I18n::getInstance()->getS($group,$key,$args);
}
function __h($group,$key){
	return I18n::getInstance()->removeHtml($group,$key);
}
?>

