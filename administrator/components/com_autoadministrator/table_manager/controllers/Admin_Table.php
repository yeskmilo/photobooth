<?php
	/**
	* @package		Cuppa CMS
	* @copyright	Copyright (C) 2011 Open Source Matters, T-Golden Group :: tufik2@hotmail.com
	* @Version 		b.0..1 (GPL)
	*/
	// No direct access
        defined('_JEXEC') or die;
        
	ini_set("include_path", "components/com_autoadministrator/"); 
	require("table_manager/views/Admin_Table.php");
	
	class Admin_Table_Controller{		
		private $view;
		public function Admin_Table_Controller(){
			//print_r($_REQUEST);
			$db = DataBase::getInstance();
			$this->view = new Admin_Table_View();
			if(@$_REQUEST["task"] == "new" || @$_REQUEST["task"] == "edit"){
				$db = DataBase::getInstance();
				$field_types = $db->GetList("cu_tables", 0, "table_name = '".$_REQUEST["view"]."'");
				$field_types = json_decode($field_types[0]["params"]);
				$table_name = $_REQUEST["view"];
				if($_REQUEST["task"] == "edit"){ 
					if(is_array($_REQUEST["cid"])) $_REQUEST["id"] = $_REQUEST["cid"][0];
					if($_REQUEST["id"] == "session") $_REQUEST["id"] = $_SESSION["id"];
					$info = $db->GetRow($_REQUEST["view"], $field_types->primary_key."='".@$_REQUEST["id"]."'", @$_SESSION["token"]);
				}else{ $_REQUEST["id"] = "0";  }
				$infoColumbs = $db->GetColums($table_name, @$_SESSION["token"]);
				$this->view->AddItem(@$info, $infoColumbs, $field_types);
			}else if(@$_REQUEST["task"] == "save"){
				$db = DataBase::getInstance();
				$infoColumbs = $db->GetColums($_REQUEST["view"], @$_SESSION["token"]);
				$data_to_save = array();
				for($i = 0; $i < count($infoColumbs); $i++){ 
					$data_to_save[$infoColumbs[$i]] = "'".@$_REQUEST[$infoColumbs[$i]."_field"]."'";
				}
				$db->Add($_REQUEST["view"], $data_to_save, @$_SESSION["token"]);
				$this->ShowList();
			}else if(@$_REQUEST["task"] == "remove"){
				@$_REQUEST["limitstart"] = "0";
				$db = DataBase::getInstance();
				$field_types = $db->GetList("cu_tables", 0, "table_name = '".$_REQUEST["view"]."'");
				$field_types = json_decode($field_types[0]["params"]);
				for($i = 0; $i < count($_REQUEST["cid"]); $i++){ $db->Delete($_REQUEST["view"], $field_types->primary_key."='".$_REQUEST["cid"][$i]."'", 0); }
				$this->ShowList();
			}else{
				$this->ShowList();
			}
		}
		// Show list of recipes
			public function ShowList(){
				$db = DataBase::getInstance();
				// Paginator
					$totalRows = $db->GetTotalRows($_REQUEST["view"]);
					$configuration = new JConfig();
					$list_limit = $configuration->list_limit;
					$limitstart = 0;  if(@$_REQUEST["limitstart"]){  $limitstart = $_REQUEST["limitstart"]; }
					$limit = ($limitstart) . "," . $list_limit;
				// List
					$info = $db->GetList($_REQUEST["view"], 0, "", $limit);
					$infoColumns = $db->GetColums($_REQUEST["view"]);
					$field_types = $db->GetList("cu_tables", 0, "table_name='".$_REQUEST["view"]."'");
					$field_types = json_decode($field_types[0]["params"]);
					$this->view->ListItems($info, $infoColumns, $field_types, $totalRows);
			}
    }
?>