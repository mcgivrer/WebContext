<?php
include_once("modules/config.php");
/**
 * Teplate manager to render temlpate (*.tpl file) base on PHP.
 * @author Frédéric Delorme<frederic.delorme@gmail.com>
 *
 */
class Template{
    /**
     * Singleton instance
     */
	static 	$_instance  = null;
	/**
	 * List of existing themes
	 */
	private $_themes    = null;

	private $activated  = "default";
	private $values     = null;
	private $manager    = null;

  public function Template(){
		__debug("Template::Template() - constructor");

		if($this->_themes == null){
			$this->values=array();
			$this->activated = __config("theme","activated");
			I18n::getInstance()->addI18nTheme($this->activated);
		}
  }

    /**
     * Declare the parent manager for this Template
     * @param $manager the parent manager driving this template engine.
     */
	public function setManager($manager){
		if($this->manager == null){
		    $this->manager = $manager;
		}
	}

	/**
	 * prepare a value for template display
	 * @param $key the key used to retrieve the value in template.
	 * @param $value to be stored on $key.
	 */
	public function set($key,$value){
		__debug("Template::set() - set the variable '$key' for template display.");
		$this->values[$key] = $value;
		I18n::getInstance()->addI18nTheme($this->activated);
	}

	/**
	 * retrieve the value from $key.
	 * @param $key the key of the value to be retrieved for display purpose.
	 */
	public function get($key){
		__debug("Template::get() - retrieve the variable '$key' for template display.");
		return $this->values[$key];
	}

	/**
	 *
	 */
	public function render($file){
		__debug("Template::render() - render template '$file.tpl'");
		return include("templates/".$this->activated."/".$file.".tpl");
	}

	public function getCss($cssfile){
		__debug("Template::getCss() - css file '$cssfile.css'");
		return "templates/".$this->activated."/css/".$cssfile.".css";
	}


	/**
	 * initialise Template engine.
	 */
	public function getInstance(){
		__debug("Template::getInstance() - retrieve Template instance");
		if(!isset(self::$_instance) || self::$_instance == null){
			self::$_instance = new Template();
		}
		return self::$_instance;
	}

}
/**
 * helper function for template value retrieving.
 * @param the key of the value to be displayed.
 */
function __tget($key){
	return Template::getInstance()->get($key);
}

/**
 * helper function for template value retrieving.
 * @param the key of the value to be displayed.
 */
function __tset($key,$value){
	return Template::getInstance()->set($key,$value);
}

/**
 * return filename with path of the $cssfile.
 * @param $cssfile name of the css file to import without extension (.css).
 */
function __tcss($cssfile){
	return Template::getInstance()->getCss($cssfile);
}
/**
 * helper function to inlude template value file.
 * @param the key of the value to be displayed.
 */
function __timport($file){
	return Template::getInstance()->render($file);
}
?>

