<?php 
	/**
	* @package		Cuppa CMS
	* @copyright	Copyright (C) 2011 Open Source Matters, T-Golden Group :: tufik2@hotmail.com
	* @Version 		b.0..1 (GPL)
	*/
	// No direct access
        defined('_JEXEC') or die;
	
	class File{
		private $config;
		private $errorMessage;
		public $urlConfig = "../../table_manager/fields/config/File.php";
		
		public function GetItem($name, $value = "", $config = NULL, $required = false, $errorMessage = "", $eventsString = ""){
			if(!$value) $value = "";
			$this->errorMessage = $errorMessage; if(!$errorMessage) $this->errorMessage = " ";
			$this->config = json_decode($config);
			$field = "<div style='position:relative; margin-top:4px;'>";
			$field .= "<input style='position:relative; vertical-align:top; margin-top:4px;' type='text' $eventsString id='".$name."' name='".$name."' value='$value' onchange='UploadFile()' ";
			$field .= " readonly='readonly' class='text_field readonly"; 
				if($required) $field .= " required ";
			$field .= " ' ";
			$field .= " title='$this->errorMessage' ";
			$field .= " /> ";
			$field .= " <script>ConfigUploadFile('$name', '".@$this->config->folder."','*.bmp; *.csv; *.doc; *.gif; *.ico; *.jpg; *.jpeg; *.odg; *.odp; *.ods; *.odt; *.pdf; *.png; *.ppt; *.swf; *.txt; *.xcf; *.xls; *.docx; *.xlsx','5242880')</script>";
			$field .= "<input type='file' id='".$name."_upload' name='".$name."_upload' />";
			$field .= "</div>";
			return $field;
		}
	}
?>
<script>
	function ConfigUploadFile(name, folder, allowed_extensions, maximum_file_size){
		jQuery(document).ready(function() {
			jQuery('#' + name + "_upload").uploadify({
				'uploader'  : 'components/com_autoadministrator/assets/js/uploadify/uploadify.swf',
				'script'    : 'components/com_autoadministrator/assets/js/uploadify/uploadify.php',
				'cancelImg' : 'components/com_autoadministrator/assets/js/uploadify/cancel.png',
				'folder'    :  folder,
				'auto'      : true,
				'fileExt'   : allowed_extensions,
				'fileDesc'  : allowed_extensions,
				'sizeLimit' : maximum_file_size,
				'height'	: 25,
				'width'		: 93,
				'onComplete': function(event, ID, fileObj, response, data) {
					jQuery("#" + name).attr("value", folder +"/"+ fileObj.name);
			    }
			});
		});
	}
</script>