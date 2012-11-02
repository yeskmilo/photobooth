<?php
	/**
	* @package		Cuppa CMS
	* @copyright	Copyright (C) 2011 Open Source Matters, T-Golden Group :: tufik2@hotmail.com
	* @Version 		b.0..1 (GPL)
	*/
	
	class DataBase{
		private static $instance;
		private $securityValidate = true;
		private $security;
		public $db = "";
		public $host = "";
		public $user = "";
		public $password = "";
		private $con;
		
		public function DataBase($db = "", $host = "", $user = "", $password = "", $securityValidate = true){
			if($db) $this->db = $db; if($host) $this->host = $host; if($user) $this->user = $user; if($password) $this->password = $password; $this->securityValidate = $securityValidate;
			if($securityValidate) $this->security = Security::getInstance();
			$this->con = mysql_connect($this->host,$this->user, $this->password);
			if (!$this->con){ return "Error de Conexion: ".mysql_error();}
			mysql_select_db($this->db, $this->con);
			mysql_query("SET NAMES 'utf8'");
		}
		public static function getInstance($db = "", $host = "", $user = "", $password = "", $securityValidate = true) {
			if (self::$instance == NULL) { self::$instance = new DataBase($db, $host, $user, $password, $securityValidate); } 
			return self::$instance;
		}
		// Functions
			public function Add($table, $data, $token = 0){
				if($this->securityValidate){ if(!$this->security->SecurityValidator($token)) return 0; }
				for($i = 0; $i < count($data); $i++){ unset($data[$i]); }
				
				$sql = "INSERT INTO $table ( ";
				$sql .= implode(" , ", array_keys($data));
				$sql .=  ") VALUES ( ";
				$sql .= implode(" , ", $data);
				$sql .= " ) ";
				$sql .= "ON DUPLICATE KEY UPDATE ";
				$current_key = 0;
				foreach ($data as $key => $value) {
					if($current_key  == count($data)-1) $sql .= $key . "=" . $value . "";
					else $sql .= $key . "=" . $value . ", ";
					$current_key++;
				}
				$sql = trim($sql);
				$query = mysql_query($sql);
				if($query){ return 1; }
				echo "SQL: " . $sql;
				return 0;
			}
			public function Insert($table, $data, $token = 0){ 
				if($this->securityValidate){ if(!$this->security->SecurityValidator($token)) return 0; }
				for($i = 0; $i < count($data); $i++){ unset($data[$i]); }
				$sql = "INSERT INTO $table ( ";
				$sql .= implode(" , ", array_keys($data));
				$sql .=  ") VALUES ( ";
				$sql .= implode(" , ", $data);
				$sql .= " ) ";
				$sql = trim($sql);
				$query = mysql_query($sql);
				if($query){ return 1; }
				return 0;
			}
			public function Update($table, $data, $condition, $token = 0){
				if($this->securityValidate){ if(!$this->security->SecurityValidator($token)) return 0; }
				for($i = 0; $i < count($data); $i++){ unset($data[$i]); }
				$sql = "UPDATE $table SET ";
				$current_key = 0;
				foreach ($data as $key => $value) {
					if($current_key  == count($data)-1) $sql .= $key . "=" . $value . "";
					else $sql .= $key . "=" . $value . ", ";
					$current_key++;
				}
				$sql .= " WHERE $condition";
				$sql = trim($sql);
				$query = mysql_query($sql);
				if($query){ return 1; }
				return 0;
			}
			public function GetRow($table, $condition, $token = 0){
				if($this->securityValidate){ if(!$this->security->SecurityValidator($token)) return 0; }
				$sql = "SELECT * FROM $table WHERE $condition";
				$query = mysql_query($sql);
				$row = mysql_fetch_array($query);
				if($row != ""){ return $row; }
				return 0;
			}
			public function GetList($table, $token = 0, $condition = '', $limit = '', $order_by = ''){
				if($this->securityValidate){ if(!$this->security->SecurityValidator($token)) return 0; }
				$sql = "SELECT * FROM $table ";
				if($condition) $sql .= " WHERE $condition ";
				if($order_by) $sql .= " ORDER BY $order_by ";
				if($limit) $sql .= " LIMIT $limit";
				$query = mysql_query($sql);
				$totalRows = mysql_num_rows($query);
				if($totalRows > 0){
					$result = array();
					while ($row = mysql_fetch_array($query)){ array_push($result,$row); }
					return $result;
				}
				return 0;
			}
			public function Delete($table, $condition, $token = 0){
				if($this->securityValidate){ if(!$this->security->SecurityValidator($token)) return 0; }
				$sql = "DELETE FROM $table WHERE $condition";
				$query = mysql_query($sql);
				if($query){ return 1; }
				return 0;
			}
			public function GetTotalRows($table, $token = 0, $condition = ''){
				if($this->securityValidate){ if(!$this->security->SecurityValidator($token)) return 0; }
				$sql = "SELECT count(*) as total FROM $table ";
				if($condition)  $sql .= " WHERE $condition";
				$query = mysql_query($sql);
				$row = mysql_fetch_array($query);
				if($row != ""){ return $row["total"]; }
				return 0;
			}
			public function GetError($token = 0){
				if($this->securityValidate){ if(!$this->security->SecurityValidator($token)) return 0; }
				return array(mysql_errno($this->con), mysql_error($this->con));
			}
			public function GetColums($table, $token = 0){
				if($this->securityValidate){ if(!$this->security->SecurityValidator($token)) return 0; }
				$sql = "SHOW COLUMNS FROM $table";
				$query = mysql_query($sql);
				if($query){
					$colums = array();
					while ($row = mysql_fetch_assoc($query)) { 	array_push($colums, $row["Field"]); }
					return $colums;
				}
				return 0;
			}
			public function GetTables($token = 0){
				if($this->securityValidate){ if(!$this->security->SecurityValidator($token)) return 0; }
				$sql = "SHOW TABLES";
				$query = mysql_query($sql);
				if($query){
					$tables = array();
					while ($row = mysql_fetch_assoc($query)) { 	array_push($tables, $row["Tables_in_".$this->db]); }
					return $tables;
				}
				return 0;
			}
			public function PersonalSql($sql, $token = 0){
				if($this->securityValidate){ if(!$this->security->SecurityValidator($token)) return 0; }
				$query = mysql_query($sql);
				if($query){ 
					$totalRows = @mysql_num_rows($query);
					if($totalRows > 0){
						$result = array();
						while ($row = mysql_fetch_array($query)){ array_push($result,$row); }
						return $result;
					}
					return 1;
				}
				return 0;
			}
			//++ Personal functions
				public function GetTablesNoRegistered($token = 0){
					if($this->securityValidate){
						if(!$this->security->SecurityValidator($token)) return 0;
					}
					$registeredTables = $this->GetList("cu_tables", $this->security->token);
					$registeredTablesSQL = array();
					for($i = 0; $i< count($registeredTables); $i++){
						array_push($registeredTablesSQL, "'".$registeredTables[$i]["table_name"]."'");
					}
					array_push($registeredTablesSQL, "'jos_banner'");
					array_push($registeredTablesSQL, "'jos_bannerclient'");
					array_push($registeredTablesSQL, "'jos_bannertrack'");
					array_push($registeredTablesSQL, "'jos_categories'");
					array_push($registeredTablesSQL, "'jos_components'");
					array_push($registeredTablesSQL, "'jos_contact_details'");
					array_push($registeredTablesSQL, "'jos_content'");
					array_push($registeredTablesSQL, "'jos_content_frontpage'");
					array_push($registeredTablesSQL, "'jos_content_rating'");
					array_push($registeredTablesSQL, "'jos_core_acl_aro'");
					array_push($registeredTablesSQL, "'jos_core_acl_aro_groups'");
					array_push($registeredTablesSQL, "'jos_core_acl_aro_map'");
					array_push($registeredTablesSQL, "'jos_core_acl_aro_sections'");
					array_push($registeredTablesSQL, "'jos_core_acl_groups_aro_map'");
					array_push($registeredTablesSQL, "'jos_core_log_items'");
					array_push($registeredTablesSQL, "'jos_core_log_searches'");
					array_push($registeredTablesSQL, "'jos_groups'");
					array_push($registeredTablesSQL, "'jos_menu'");
					array_push($registeredTablesSQL, "'jos_menu_types'");
					array_push($registeredTablesSQL, "'jos_messages'");
					array_push($registeredTablesSQL, "'jos_messages_cfg'");
					array_push($registeredTablesSQL, "'jos_migration_backlinks'");
					array_push($registeredTablesSQL, "'jos_modules'");
					array_push($registeredTablesSQL, "'jos_modules_menu'");
					array_push($registeredTablesSQL, "'jos_newsfeeds'");
					array_push($registeredTablesSQL, "'jos_plugins'");
					array_push($registeredTablesSQL, "'jos_poll_data'");
					array_push($registeredTablesSQL, "'jos_poll_date'");
					array_push($registeredTablesSQL, "'jos_poll_menu'");
					array_push($registeredTablesSQL, "'jos_polls'");
					array_push($registeredTablesSQL, "'jos_sections'");
					array_push($registeredTablesSQL, "'jos_session'");
					array_push($registeredTablesSQL, "'jos_stats_agents'");
					array_push($registeredTablesSQL, "'jos_templates_menu'");
					array_push($registeredTablesSQL, "'jos_users'");
					array_push($registeredTablesSQL, "'jos_weblinks'");
					array_push($registeredTablesSQL, "'cu_menu_items'");
					array_push($registeredTablesSQL, "'cu_tables'");
					$registeredTablesSQL = implode(",",$registeredTablesSQL);
					$sql = "SHOW TABLES WHERE Tables_in_".$this->db." NOT IN ($registeredTablesSQL)";
					$query = mysql_query($sql);
					if($query){
						$tables = array();
						while ($row = mysql_fetch_assoc($query)) { 	array_push($tables, $row["Tables_in_".$this->db]); }
						return $tables;
					}
					return 0;
				}
	}
?>