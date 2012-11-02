<?php
/**
 * FW Gallery 2.0.0
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined('_JEXEC') or die('Restricted access');

$db =& JFactory :: getDBO();
$db->setQuery('SHOW FIELDS FROM #__fwg_files');
$fields = method_exists($db, 'loadColumn')?$db->loadColumn():$db->loadResultArray();
$list = array(
	'hits'=>'ALTER TABLE `#__fwg_files` ADD COLUMN `hits` INT(10) UNSIGNED NOT NULL DEFAULT \'0\' AFTER `ordering`;',
	'type_id'=>'ALTER TABLE `#__fwg_files` ADD COLUMN `type_id` INT(10) UNSIGNED NOT NULL DEFAULT \'0\' AFTER `project_id`,  ADD INDEX `type_id` (`type_id`);',
	'user_id'=>'ALTER TABLE `#__fwg_files` ADD COLUMN `user_id` INT(10) UNSIGNED NOT NULL DEFAULT \'0\' AFTER `project_id`,  ADD INDEX `user_id` (`user_id`);',
	'latitude'=>'ALTER TABLE `#__fwg_files` ADD COLUMN `latitude` FLOAT NOT NULL DEFAULT \'0\';',
	'longitude'=>'ALTER TABLE `#__fwg_files` ADD COLUMN `longitude` FLOAT NOT NULL DEFAULT \'0\';',
	'copyright'=>'ALTER TABLE `#__fwg_files` ADD COLUMN `copyright` VARCHAR(100);'
);

foreach ($list as $name=>$query) {
	if (!in_array($name, $fields)) {
		$db->setQuery($query);
		if (!$db->query()) echo 'Can\'t execute a query: '.$name.' - do it manually: '.$db->getQuery().'<br/>';
	}
}

$db->setQuery('SHOW FIELDS FROM #__fwg_files_vote');
$fields = method_exists($db, 'loadColumn')?$db->loadColumn():$db->loadResultArray();
$list = array(
	'ipaddr'=>'ALTER TABLE `#__fwg_files_vote` ADD COLUMN `ipaddr` BIGINT NULL, ADD INDEX `ipaddr` (`ipaddr`), DROP PRIMARY KEY, ADD INDEX `user_id` (`user_id`), ADD INDEX `file_id` (`file_id`)',
);

foreach ($list as $name=>$query) {
	if (!in_array($name, $fields)) {
		$db->setQuery($query);
		if (!$db->query()) echo 'Can\'t execute a query: '.$name.' - do it manually: '.$db->getQuery().'<br/>';
	}
}
$db->setQuery('ALTER TABLE `#__fwg_files_vote`  CHANGE COLUMN `ipaddr` `ipaddr` BIGINT NULL DEFAULT NULL');
$db->query();

$db->setQuery('SHOW FIELDS FROM #__fwg_projects');
$fields = method_exists($db, 'loadColumn')?$db->loadColumn():$db->loadResultArray();
$list = array(
	'parent'=>'ALTER TABLE `#__fwg_projects` ADD COLUMN `parent` INT(10) UNSIGNED NOT NULL DEFAULT 0, ADD INDEX `parent` (`parent`)',
	'gid'=>'ALTER TABLE `#__fwg_projects` ADD COLUMN `gid` TINYINT UNSIGNED NOT NULL DEFAULT 0, ADD INDEX `gid` (`gid`)',
	'color'=>'ALTER TABLE `#__fwg_projects` ADD COLUMN `color` CHAR(6)'
);

foreach ($list as $name=>$query) {
	if (!in_array($name, $fields)) {
		$db->setQuery($query);
		if (!$db->query()) echo 'Can\'t execute a query: '.$name.' - do it manually: '.$db->getQuery().'<br/>';
	}
}
/* install simple template */
$source_path = $this->parent->getPath('source').'/';
if (file_exists($source_path.'com_fwgallerytmplsimple.zip') and JArchive::extract($source_path.'com_fwgallerytmplsimple.zip', $source_path.'com_fwgallerytmplsimple')) {
	$installer = new JInstaller();
	$installer->install($source_path.'com_fwgallerytmplsimple');
	JFolder :: delete($source_path.'com_fwgallerytmplsimple');
}
?>