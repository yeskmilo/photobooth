<?php
	/**
	* @package		Cuppa CMS
	* @copyright	Copyright (C) 2011 Open Source Matters, T-Golden Group :: tufik2@hotmail.com
	* @Version 		b.0..1 (GPL)
	*/
	// No direct access
        defined('_JEXEC') or die;
	
	ini_set("include_path", "components/com_autoadministrator/"); 
	require("table_manager/views/Table_Manager.php");
	
	class Table_Manager_Controller{		
		private $view;
		public function Table_Manager_Controller(){
			//print_r($_REQUEST);
			$db = DataBase::getInstance();
			$this->view = new Table_Manager_View();
			if(@$_REQUEST["task"] == "new" || @$_REQUEST["task"] == "edit"){
				$db = DataBase::getInstance();
				@$table_name = $_REQUEST["table_name"];
				if($_REQUEST["task"] == "edit"){
					if(is_array($_REQUEST["cid"])) $_REQUEST["id"] = $_REQUEST["cid"][0];
					$info = $db->GetRow("cu_tables", "id=".@$_REQUEST["id"]);
					$table_name = $info["table_name"];
				}else{
					$_REQUEST["id"] = "0";
				}
				$infoColumbs = $db->GetColums($table_name);
				//++ Get type fields
					$files = scandir("components/com_autoadministrator/table_manager/fields/");
					$field_types = array();
					for($i = 0; $i < count($files); $i++){
						if($files[$i] != "." && $files[$i] != ".."){ 
							$file = explode(".", $files[$i]); 
							if(count($file) > 1) array_push($field_types, array($file[0], $file[0]." field"));
						}
					}
					$field_types = json_encode($field_types);
				//--
				$this->view->AddItem(@$info, $infoColumbs, $table_name, $field_types);
			}else if(@$_REQUEST["task"] == "save"){
				$db = DataBase::getInstance();
				$infoColumbs = $db->GetColums($_REQUEST["table_name"]);
				$data_to_save = array();
				for($i = 0; $i < count($infoColumbs); $i++){
						$array = array();
						$array["type"] = mysql_real_escape_string($_REQUEST[$infoColumbs[$i]."_field"]);
						$array["label"] = mysql_real_escape_string($_REQUEST[$infoColumbs[$i]."_label"]);
						if(isset($_REQUEST[$infoColumbs[$i]."_showList"])) $array["showList"] = 1; else $array["showList"] = 0;
						if(isset($_REQUEST[$infoColumbs[$i]."_required"])) $array["required"] = 1; else $array["required"] = 0;
						if(isset($_REQUEST[$infoColumbs[$i]."_field_config"])) $array["config"] = json_decode(str_replace("\\", "",$_REQUEST[$infoColumbs[$i]."_field_config"]));
					$data_to_save[$infoColumbs[$i]] = $array;
				}
				$data_to_save["primary_key"] = $_REQUEST["primary_key"];
				$json = json_encode($data_to_save);				
				if(isset($_REQUEST["id"])) $data["id"] = "'".$_REQUEST["id"]."'"; else $data["id"] = "'0'";
				$data["table_name"] = "'".$_REQUEST["table_name"]."'";
				$data["params"] = "'".$json."'";
				$db->Add("cu_tables", $data);
				$this->ShowList();
			}else if(@$_REQUEST["task"] == "remove"){
				$db = DataBase::getInstance();
				for($i = 0; $i < count($_REQUEST["cid"]); $i++){ $db->Delete("cu_tables", "id='".$_REQUEST["cid"][$i]."'"); }
				$this->ShowList();
			}else{
				$this->ShowList();
			}
		}
		// Show list of recipes
			public function ShowList(){
				$db = DataBase::getInstance();
				$info = $db->GetList("cu_tables");
				$infoTables = $db->GetTablesNoRegistered();
				$this->view->ListItems($info, $infoTables);
			}
    }
?>