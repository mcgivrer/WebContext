<?php
class Model{
	private static  $_instance=null;
	private $model=null;
	private $sitepath="";
	const OPENTAG="[[";
	const CLOSETAG="]]";
	
	public function verify(){
		$this->sitepath=__config('system','path');
		__debug("Model::verify() - verify model.xml in [".$this->sitepath."/config/model.xml"."]");
		if(file_exists($this->sitepath."/config/model.xml")){
			$this->model=SimpleXml_Load_file($this->sitepath."/config/model.xml");
			if($this->model==null){			
				__error("Model::verify() - model.xml is unreadable.");
			}else{
			
				$data=$this->model->xpath("entity");
				foreach($data as $entity){
					$name = $entity->attributes()->name;
					if(!file_exists($sitepath."/modules/models/$name.php")){
						__debug("Model::verify() - generate entity $name");
						$this->generate($name,$entity);
					}
				}
			}
		}else{
			__error("STOP - model.xml does not exist");
		}
	}


	public function generate($name,$entity){
		__debug("Model::generate() - name=$name, entity=".print_r($entity,true));
		$phfields = array();
		$phrelations=array();
		
		$fields=$entity->xpath("field");
		foreach($fields as $field){
			$phfields[OPENTAG.$field->attributes()->name.CLOSETAG]="".$field->attributes()->name;
		}
		$relations = $entity->xpath("relation");
		foreach($relations as $relation){
			switch($relation->attributes()->type){
				case "one-to-one":
					$phrelations[OPENTAG.$relation->attributes()->name.CLOSETAG]=$relation->attributes()->name;
					break;
				case "one-to-many":
					$phrelations[OPENTAG.$relation->attributes()->name.CLOSETAG]=$relation->attributes()->name;
					break;
				case "many-to-one":
					$phrelations[OPENTAG.$relation->attributes()->name.CLOSETAG]=$relation->attributes()->name;
					break;
				case "many-to-many":
					$phrelations[OPENTAG.$relation->attributes()->name.CLOSETAG]=$relation->attributes()->name;
					break;
				default:
			}	
		}
		$template=file_get_contents($this->sitepath."/modules/classtemplates/classentity.tpl");
		$entityclass=$template;
		print_r($entityclass);
		$entityclass=str_replace(OPENTAG."class.name".CLOSETAG,ucfirst($name),$entityclass);
		print_r($entityclass);
		$entityclass=str_replace(OPENTAG."class.comment".CLOSETAG,$entity->attributes()->description,$entityclass);
		print_r($entityclass);
		//$entityclass=preg_replace(array_keys($phfields),array_values($phfields),$entityclass);
		__debug("class generated:".$entityclass);
		$file=fopen($this->sitepath."/modules/models/$name.php","w+");
		fwrite($file,$entityclass);
	}

	public function getInstance(){
		if(self::$_instance==null){
			self::$_instance=new Model();
		}
		return self::$_instance;
	}

}
?>
