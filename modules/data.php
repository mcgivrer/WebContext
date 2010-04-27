<?php
	/**
	 * Data is a class retrieving and preparing all data to be diplayed ion the home page.
	 */
	class Data{
		/**
		 * Instance for the data class manager
		 */
		static $_instance = null;
		/**
		 * Data array
		 */
		static $_data = array();

		static $_connection=array(
						'server'=>"localhost",
						'port'=>"3306",
						'username'=>"root",
						'password'=>"nathalie",
						'databasename'=>"webcontext");

		static $_entities=array("features");
		static $_con = null;

		/**
		 * Connection to MySQL database, using the $connection parameters
		 */
		function connect(){
			self::$_con = mysql_connect(
							self::$_connection['server'].":".self::$_connection['post'],
							self::$_connection['username'],
							self::$_connection['password']);
			mysql_select_db(self::$_connection['databasename']);
		}

		/**
		 * retrieve data to dipslay and prepare all data for the page
		 */
		function load(){
			/*$this->connect();
			foreach(self::$_entities as $entity) :
				self::$_data[$entity] = $this->preLoadEntity($entity);
			endforeach;*/
		}

		function preLoadEntity($entity){
				/*$list = array();
				$rs = mysql_query("select * from $entity limit 0,10;");
				while($entity = mysql_fetch_array($rs)){
					$list[]=$entity;
				}*/
				return $list;
		}

		function oldLoad(){
			self::$_data = array(
			'categories' => array(
				'1'	=> array(
					'title'	=> "demo",
					'url'	=>"demo",
					'shortcut'=> "d",
					'tooltip'	=> "Show me all the demo"
					),
				'2'	=> array(
					'title'	=> "games",
					'url'	=>"games",
					'shortcut'=> "g",
					'tooltip'	=> "Video games tests"
					),
				'3'	=> array(
					'title'	=> "blog",
					'url'	=>"blog",
					'shortcut'=> "b",
					'tooltip'	=> "The Web-context life's blog"
					),
			),
			'features' => array(
				'1'=> array(
					'id'		 => "1",
					'title'  => "Demo 01",
					'url'		 => "demo-01",
					'style'	 => "",
					'media'	 => array(
							'header' => array(
											'image'=>"header/wet.jpg",
											'title'=>"Wet on X360",
											'alternative_text'=>"wet a game for X360",
											),
							'cover' => array(
											'image'=>"cover/wet.jpg",
											'title'=>"A CSS2+XHTML+Jquery demo",
											'alternative_text'=>"wet a game for X360",
											),
							'screenshots' => array(
									'1'=> array(
											'image'=>"screenshots/wet-sc001.jpg",
											'title'=>"",
											'alternative_text'=>"",
											),
									'2'=> array(
											'image'=>"screenshots/wet-sc002.jpg",
											'title'=>"",
											'alternative_text'=>"",
											),
									'3'=> array(
											'image'=>"screenshots/wet-sc003.jpg",
											'title'=>"",
											'alternative_text'=>"",
											),
									),
							),
					'header' => "This small design sample is a demonstration of what can be done with simple color and mainly with CSS design (and I have to appologires, yes, there is javascript too, thanks to JQuery). The Concept is a simple News Media portal, about cinema, and video games.\r\n(picture are coming from there respective owner on internet.)",
					'content' => "",
					'tags' => array(
										'css'=>array(	'name'=>"css", 'tooltip'=>"View all 'css' tagged articles"),
										'html'=>array(	'name'=>"html", 'tooltip'=>"View all 'html' tagged articles"),
										'design'=>array(	'name'=>"design", 'tooltip'=>"View all 'design' tagged articles"),
										),
					'state'	=> 1
					),
				'2'=> array(
					'id'		 => "2",
					'title'  => "Demo 02",
					'url'		 => "demo-02",
					'style'	 => "",
					'media'	 =>array(
							'header'	 => array(
											'image'=>"header/oss117.jpg",
											'title'=>"A special french spy movie",
											'alternative_text'=>"OSS117",
											),
									 ),
					'header' => "This small design sample is a demonstration of what can be done with simple color and mainly with CSS design (and I have to appologires, yes, there is javascript too, thanks to JQuery). The Concept is a simple News Media portal, about cinema, and video games.

(picture are coming from there respective owner on internet.)",
					'content' => "",
					'tags' => array(
										'movie'=>array(	'name'=>"movie", 'tooltip'=>"View all 'movie' tagged articles"),
										'fun'=>array(	'name'=>"fun", 'tooltip'=>"View all 'fun' tagged articles"),
										'spy'=>array(	'name'=>"spy", 'tooltip'=>"View all 'spy' tagged articles"),
										),
					'state'	=> 1
					),
				'3'=> array(
					'id'		 => "3",
					'title'  => "Demo 03",
					'url'		 => "demo-03",
					'style'	 => "",
					'media'	 =>array(
							'header'	 => array(
											'image'=>"header/outland.jpg",
											'title'=>"A SF story near Jupiter mines",
											'alternative_text'=>"Sean Connery, space sherif.",
											),
									 ),
					'header' => "This small design sample is a demonstration of what can be done with simple color and mainly with CSS design (and I have to appologires, yes, there is javascript too, thanks to JQuery). The Concept is a simple News Media portal, about cinema, and video games.

(picture are coming from there respective owner on internet.)",
					'content' => "",
					'tags' => array(
										'movie'=>array(	'name'=>"movie", 'tooltip'=>"View all 'movie' tagged articles"),
										'sf'=>array(	'name'=>"sf", 'tooltip'=>"View all 'sf' tagged articles"),
										),
					'state'	=> 1
					),
				)
			);
		}
		/**
		 * return the requested entity.
		 */
		function get($entity){
			__debug("Data::get() - retrieve '$entity' data");
			return self::$_data[$entity];
		}


		/**
		 * find all occurrences of entity.
		 */
        function findAll($entity){
		    // TODO develop the real findAll method.
            return $this->get($entity);
        }

		/**
		 * find entity for condition.
		 */
		function find($entity,$condition=""){
		    // TODO develop the real find method.
            return $this->get($entity);
		}
		/**
		 * return instance of the Data Class (singleton pattern).
		 */
		function getInstance(){
				if(self::$_instance==null){
					self::$_instance = new Data();
				}
				return self::$_instance;
		}
	}
?>

