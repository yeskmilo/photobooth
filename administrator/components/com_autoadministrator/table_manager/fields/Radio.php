<?php 
	/**
	* @package		Cuppa CMS
	* @copyright	Copyright (C) 2011 Open Source Matters, T-Golden Group :: tufik2@hotmail.com
	* @Version 		b.0..1 (GPL)
	*/
	// No direct access
        defined('_JEXEC') or die;
	
	class Radio{
		private $required;
		private $config;
		private $errorMessage;
		public $urlConfig = "../../table_manager/fields/config/Radio.php";
		
		public function GetItem($name = "input", $value = "", $config = NULL, $required = false, $errorMessage = "", $eventsString = ""){
			$this->required = $required;
			$this->config = json_decode($config);
			$this->errorMessage = $errorMessage; if(!$errorMessage) $this->errorMessage = " ";
			$field = "";
			for($i = 0; $i < count($this->config); $i ++){
				$ban = 0;
				if(!$value && $i == 0){
					$ban = 1;
					$field .= '<input type="radio" checked="checked" title="'.$this->errorMessage.'" name="'.$name.'" id="'.$name.'_'.$this->config[$i][0].'" value="'.$this->config[$i][0].'" ';
				}else if($value == $this->config[$i][0]){
					$ban = 2;
					$field .= '<input type="radio" checked="checked" title="'.$this->errorMessage.'" name="'.$name.'" id="'.$name.'_'.$this->config[$i][0].'" value="'.$this->config[$i][0].'" ';
				}else{
					$ban = 3;
					$field .= '<input type="radio" title="'.$this->errorMessage.'" name="'.$name.'" id="'.$name.'_'.$this->config[$i][0].'" value="'.$this->config[$i][0].'" ';
				}
				$field .= ' class="radio ';
				if($this->required) $field .= ' required  ';
				$field .= '" /><font class="text_radio">' . $this->config[$i][1] .  '</font>';
			}
			return $field;
		}
	}
?>