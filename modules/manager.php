<?php
include_once("modules/config.php");
include_once("modules/data.php");
include_once("modules/debug.php");
include_once("modules/i18n.php");
include_once("modules/model.php");
include_once("modules/template.php");
include_once("modules/utilities.php");
/**
 * Main Site Manager.
 * parse Model file and generate classes if not exists in model path.
 */
class Manager{
    /**
     * static Instance attribute (for singleton pattern)
     */
	static $_instance 	        = null;
	/**
     * Xml Etities models manipulated by the site
     */
	private $_model 		    = null;
	/**
	 * Internationalization manager instance
	 */
	private $_i18n 			    = null;
	/**
	 * template manager
	 */
	private $_template          = null;



    /**
     * start generation timestamp
     */
	private $generateStartTime  = null;
    /**
     * end generation timestamp
     */
	private $generateEndTime    = null;


    /**
     * Initialize manager : verify Model consistency
     */
	public function init(){
		Model::getInstance()->verify();
		I18n::getInstance();
		Template::getInstance()->setManager($this);
	}

    /**
     * Prepare data to be displayed.
     */
    function preProcess(){}

    /**
     * return the name (string) of the template to render.
     */
	function renderTemplate(){}

    /**
     * render main template.
     */
	public function render(){
		Template::getInstance()->render($this->renderTemplate(),$this);
	}

    /**
     * Min method called from index page.
     */
	public function run(){
	    $this->startTime = microtime();

		$this->init();
		$this->preProcess();
		$this->render();


	}

	/**
	 * Return starting time.
	 */
	public function getStartTime(){
	    return $this->startTime;
	}

	public function getInstance(){
		if(self::$_instance==null){
			self::$_instance=new Manager();
		}
		return self::$_instance;
	}
}
/**
 * calculate rendering time for the generated page.
 */
function __renderTime(){
    $startTime= Manager::getInstance()->getStartTime();
    $endTime=microtime();
    $generateTimeLapse = $endTime-$startTime;
    $msg = "<span class=\"mini\">Page rendered in ".($generateTimeLapse*1000)." ms.</span>";
    __debug($msg);
    echo $msg;
}
?>

