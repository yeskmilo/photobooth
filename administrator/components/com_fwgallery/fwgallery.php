<?php
/**
 * FW Gallery 2.0.0
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined( '_JEXEC' ) or die( 'Restricted access' );

JHTML :: stylesheet('styles.css', 'administrator/components/com_fwgallery/assets/css/');
JHTML::addIncludePath(JPATH_COMPONENT_SITE.DS.'helpers');
JHTML::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers');
JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');

require_once(JPATH_COMPONENT_SITE.DS.'helpers'.DS.'helper.php');
require_once(JPATH_COMPONENT.DS.'controller.php');

$controller   = new fwGalleryController();
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();

?>