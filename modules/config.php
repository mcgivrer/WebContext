<?php
class Config{
	static $_instance = null;
	static $_parameters = null;


	public function Config(){
		self::$_parameters = parse_ini_file("config/config.ini",true);
	}

	/**
	 * return the key based on $group and $key identifiers.
	 * @param $group
	 * @param $key
	 */
	public function get($group,$key, $default=""){
		if(isset(self::$_parameters[$group])&&isset(self::$_parameters[$group][$key])){
			return self::$_parameters[$group][$key];
		} else if($default==""){
			return "no exists";
		} else {
		    return $default;
		}
	}

	/**
	 * test if a flag is set into config.ini file.
	 * possible value for th flag are "on", "true" or "1".
	 * @see Debug::get($group,$key)
	 * @return true if flag is set, or false.
	 */
	public function isActive($group,$key){
		$msg = $this->get($group,$key) ;
		if( $msg == "on" || $msg=="true" || $msg=="1"){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * initialise parmaters from config.ini file.
	 */
	public function getInstance(){
		if(!isset(self::$_instance) || self::$_instance == null){
			self::$_instance = new Config();
		}
		return self::$_instance;
	}
}
/**
 * helper to retreive quickly a config value.
 */
function __config($group, $key,$default=""){
	return Config::getInstance()->get($group,$key);
}
/**
 * helper to test a flag in the config file.
 */
function __isActive($group, $key){
	return Config::getInstance()->isActive($group,$key);
}
?>

