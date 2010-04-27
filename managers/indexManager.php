<?php
include_once("modules/manager.php");

class IndexManager extends Manager{


	/**
	 * Attributes for the main search form
	 */
	private $searchText         = null;


    /**
     * Pre load data to process during treatment.
     */
	public function preProcess(){
		Data::getInstance()->oldLoad();
		Template::getInstance()->set("features",Data::getInstance()->find('features',array("count=3")));
		Template::getInstance()->set("categories",Data::getInstance()->findAll('categories'));
		$this->searchText = ( $_POST['search']!=""? $_POST['search'] : "");
		Template::getInstance()->set("searchText",$this->searchText);

	}

    /**
     * render main template.
     */
	public function renderTemplate(){
		return "index/main";
	}

	public function getInstance(){
		if(self::$_instance==null){
			self::$_instance=new IndexManager();
		}
		return self::$_instance;
	}
}
?>

