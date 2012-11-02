<?php 
	/**
	* @package		Cuppa CMS
	* @copyright	Copyright (C) 2011 Open Source Matters, T-Golden Group :: tufik2@hotmail.com
	* @Version 		b.0..1 (GPL)
	*/
	// No direct access
        defined('_JEXEC') or die;
	
	class TextArea{
		private $required;
		private $config;
		private $errorMessage;
		public $urlConfig = "../../table_manager/fields/config/TextArea.php";
		
		public function GetItem($name = "input", $value = "", $config = NULL, $required = false, $errorMessage = "", $eventsString = ""){
			$this->required = $required;
			$this->config = json_decode($config);
			$this->errorMessage = $errorMessage; if(!$errorMessage) $this->errorMessage = " ";
			$field = "<textarea style='width:".$this->config->width."px; height:".$this->config->height."px' $eventsString id='".$name."' name='".$name."' ";
			$field .= " class='text_field ";
			$field .= " ' ";
			$field.= " title='$this->errorMessage' ";
			$field.= " >";
			$field.= $value;
			$field.= "</textarea>";
			if($this->config->editor == "Joomla Default Editor"){
				$editor =& JFactory::getEditor();
				$field = $editor->display($name, $value,$this->config->width, $this->config->height,"","", true);
			}
			return $field;
		}
	}
?>