<?php
/**
* @package		Cuppa CMS
* @copyright	Copyright (C) 2011 Open Source Matters, T-Golden Group :: tufik2@hotmail.com
* @Version 		b.0..1 (GPL)
*/
// No direct access
    defined('_JEXEC') or die;
// Include libreries
	$document	= JFactory::getDocument();
	$document->addScript('components/com_autoadministrator/assets/js/jquery.js');
	echo "<script>jQuery.noConflict();</script>";
	$document->addScript('components/com_autoadministrator/assets/js/jquery-ui.js');
	$document->addScript('components/com_autoadministrator/assets/js/tu_main.js');
	$document->addScript('components/com_autoadministrator/assets/js/jquery.validate.js');
	$document->addScript('components/com_autoadministrator/assets/js/jquery.md5.js');
	$document->addScript('components/com_autoadministrator/assets/js/jquery.sha1.js');
	$document->addScript('components/com_autoadministrator/assets/js/uploadify/jquery.uploadify.js');
	$document->addScript('components/com_autoadministrator/assets/js/swfobject.js');
	$document->addStyleSheet("components/com_autoadministrator/assets/css/alertConfigField.css");
	$document->addStyleSheet("components/com_autoadministrator/assets/css/tu_main.css");
	$document->addStyleSheet("components/com_autoadministrator/assets/css/jquery-ui.css");
	$document->addStyleSheet("components/com_autoadministrator/assets/js/uploadify/uploadify.css");
// Initial Connection to DB
	include("assets/classes/DataBase.php");
	$configuration = new JConfig();
	$db = DataBase::getInstance($configuration->db, $configuration->host, $configuration->user, $configuration->password, false);
// Views
if(@$_REQUEST["suboption"] == "menu_manager"){
	include("menu_manager/controllers/Menu_Manager.php");
	$menu_manager = new Menu_Manager_Controller();
}else if(@$_REQUEST["suboption"] == "table_manager"){
	if(isset($_REQUEST["view"])){
		require("table_manager/controllers/Admin_Table.php");
		$class = "Admin_Table_Controller";
		$controller = new $class();
	}else{
		include("table_manager/controllers/Table_Manager.php");
		$table_manager = new Table_Manager_Controller();
	}
}else{
	include("panels/views/mainPanel.php");
}
?>