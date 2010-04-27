<?php
include_once("modules/entity.php");
/**
 * [[class.comment]]
 */
class [[class.name]] extends Entity{

  [[loop start fields]]
  /**
   * [[field.comment]]
   */			
	public [[field.name]] [[field.default]];
	[[loop end fields ]]

  [[loop start relations]]
  /**
   * [[relation.comment]]
   */			
	public [[relation.name]] [[relation.default]];
	[[loop end relations ]]

	/**
	 * default constructor
	 */
	public [[class.name]](){
	}
}
?>
