<?php
	/**
	* @package		Cuppa CMS
	* @copyright	Copyright (C) 2011 Open Source Matters, T-Golden Group :: tufik2@hotmail.com
	* @Version 		b.0..1 (GPL)
	*/
	// No direct access
        defined('_JEXEC') or die;
        
	ini_set("include_path", "components/com_autoadministrator/");
	class Menu_Manager_Controller{	
	    private $db_prefix;
		public function Menu_Manager_Controller(){
			//print_r($_REQUEST);
            $db_joomla = &JFactory::getDBO();
            $this->db_prefix = $db_joomla->getPrefix();
			$db = DataBase::getInstance();
			if(@$_REQUEST["task"] == "new" || @$_REQUEST["task"] == "edit"){
				$db = DataBase::getInstance();
				@$table_name = $_REQUEST["table_name"];
				if($_REQUEST["task"] == "edit"){
					if(is_array($_REQUEST["cid"])) $_REQUEST["id"] = $_REQUEST["cid"][0];
					$info = $db->GetRow("".$this->db_prefix."components", "id=".@$_REQUEST["id"]);
				}else{
					$_REQUEST["id"] = "0";
				}
				// Parent List				
					$sql = "SELECT mi.id, mi.id_relationship, m.name FROM cu_menu_items as mi JOIN ".$this->db_prefix."components as m WHERE m.id = mi.id_relationship";
					$parent_list = $db->PersonalSql($sql);
					if($parent_list == 1) $parent_list = NULL;
				// Table to administrate
					$sql = "SELECT id, table_name FROM cu_tables";
					$tables = $db->PersonalSql($sql);
					if($tables == 1) $tables = NULL;
				require("menu_manager/views/edit_menu_manager.php");
			}else if(@$_REQUEST["task"] == "save"){
				$db = DataBase::getInstance();
				// Add to jos_menu
					$alias = str_replace(" ", "-", $_REQUEST["title"]);
					$alias = strtolower($alias);
					$data = array();
					$data["id"] = "'".$_REQUEST["id"]."'";
					$data["name"] = "'".$_REQUEST["title"]."'";
					$data["link"] = "'option=com_autoadministrator'";
					$data["menuid"] = "'0'";
					$data["parent"] = "'".$_REQUEST["parent_id"]."'";
					$data["admin_menu_link"] = "'"."option=com_autoadministrator&suboption=table_manager&view=". $_REQUEST["table_name"]."'";
					$data["admin_menu_alt"] = "'".$_REQUEST["title"]."'";
					$data["`option`"] = "'com_autoadministrator'";
					$data["ordering"] = "'0'";
					$data["admin_menu_img"] = "'js/ThemeOffice/component.png'";
					$data["iscore"] = "'0'";
					$data["enabled"] = "'1'";
					$result = $db->Add("".$this->db_prefix."components", $data);
				// Add to cu_menu_items
					$info_menu = $db->GetRow("".$this->db_prefix."components", "name = '".$_REQUEST["title"]."'");
					$data = array();
					$data["id"] = "'0'";
					$data["id_relationship"] = "'".$info_menu["id"]."'";
					$db->Insert("cu_menu_items", $data);
				$this->ShowList();
			}else if(@$_REQUEST["task"] == "remove"){
				$db = DataBase::getInstance();
				for($i = 0; $i < count($_REQUEST["cid"]); $i++){ 
					$db->Delete("".$this->db_prefix."components", "id='".$_REQUEST["cid"][$i]."'"); 
					$db->Delete("cu_menu_items", "id_relationship='".$_REQUEST["cid"][$i]."'"); 
				}
				$this->ShowList();
			}else{
				$this->ShowList();
			}
		}
		// Show list of recipes
			public function ShowList(){
				$db = DataBase::getInstance();
				$sql = "SELECT mi.id, mi.id_relationship, m.name, m.parent, m2.name as parent_title
						FROM cu_menu_items as mi 
						JOIN ".$this->db_prefix."components as m 
						JOIN ".$this->db_prefix."components as m2
						WHERE m.id = mi.id_relationship AND m2.id = m.id";
				$info = $db->PersonalSql($sql);
				if($info == 1) $info = NULL;
				require("menu_manager/views/list_menu_manager.php");
			}
    }
?>