<?php
	/**
	* @package		Cuppa CMS
	* @copyright	Copyright (C) 2011 Open Source Matters, T-Golden Group :: tufik2@hotmail.com
	* @Version 		b.0..1 (GPL)
	*/
	// No direct access
        defined('_JEXEC') or die;
	
	class Admin_Table_View{
		public function ListItems($info, $infoColumns, $field_types, $totalRows){
			require("tmpl/list_admin_table.php");
		}
		public function AddItem($info = NULL, $infoColumbs = NULL, $field_types = NULL){
			require("tmpl/edit_admin_table.php");
		}
	}
?>