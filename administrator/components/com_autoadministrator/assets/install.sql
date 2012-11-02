CREATE TABLE IF NOT EXISTS `cu_menu_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_relationship` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_relationship_UNIQUE` (`id_relationship`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='Content menu items.\nParent_id: Relation about the positions ';
CREATE TABLE IF NOT EXISTS `cu_tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(45) NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `table_name_UNIQUE` (`table_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='Content the table info.\nExample: [1, Products, {field name: ';