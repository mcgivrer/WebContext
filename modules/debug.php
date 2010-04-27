<?php
class Debug{
	private static $_instance = null;
	private $path="";
	private $messages = array();

	const LEVEL_MAIN="MAIN";
	const LEVEL_DEBUG="DEBUG";
	const LEVEL_INFO="DEBUG";
	const LEVEL_WARN="DEBUG";
	const LEVEL_ERROR="DEBUG";
	const LEVEL_FATAL="FATAL";

	public function Debug(){
		if($this->path==""){
			$this->path = __config("debug","logfilepath");
			$this->write("Start Log",Debug::LEVEL_MAIN);
		}
	}

	protected function write($message,$level){
		if(strstr(__config("debug","level"),$level) || $level==Debug::LEVEL_MAIN){
			$file = fopen($this->path,"a+");
			if(isset($file)){
					fwrite($file,date("Y/m/d-h:i:s")." - ".$level." - ".$message."\r\n");
			}
			if(__isActive("debug","display")){
				$this->messages[]=$level." - ".$message;
			}
		}
	}

	/**
	 * add a message to the log file.
	 */
	public function addMessage($msg,$level="DEBUG"){
		$this->write($msg,$level);
	}

	/**
	 * display all debug information to page output
	 * (mainly called from template engine)
	 */
	public function render(){
		if(__isActive("debug","display")){
			echo "<div id=\"debug\">";
			echo "<div class=\"toolbar\">";
			echo "<div class=\"title\">Debug toolbar</div>";
			echo "<div class=\"action\">";
			echo "<a class=\"button switchview\" href=\"#close\" title=\"Switch debug panel\" onclick=\"debugswitch()\">hide</a>";
			echo "| <a id=\"debug-add\" class=\"reverse\" href=\"#add\" title=\"Add lines to debug window\">+</a> | ";
			echo "<a id=\"debug-remove\" class=\"reverse\" href=\"#reduce\" title=\"reduce line number to debug window\">-</a> | ";
			echo "</div>";
			echo "</div>";
			echo "<div class=\"view\">";
			echo " <ul>";
			foreach($this->messages as $msg){
				echo "  <li>".$msg."</li>";
			}
			echo " </ul>";
			echo "</div>";
			echo "</div>";
		}
	}
	/**
	 * initialise Debug output and log file.
	 */
	public function getInstance(){
		if(!isset(self::$_instance) || self::$_instance == null){
			self::$_instance = new Debug();
		}
		return self::$_instance;
	}

}
function __debug($message){
		Debug::getInstance()->addMessage($message,"DEBUG");
}
function __warn($message){
		Debug::getInstance()->addMessage($message,"WARN");
}
function __info($message){
		Debug::getInstance()->addMessage($message,"INFO");
}
function __error($message){
		Debug::getInstance()->addMessage($message,"ERROR");
}
?>

