<?php
/**
 * Joomla! 1.5 component gallery
 *
 * @version $Id: gallery.php 2012-10-30 00:42:48 svn $
 * @author Diego Beltran
 * @package Joomla
 * @subpackage gallery
 * @license GNU/GPL
 *
 * Gallery proexport

 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Require the base controller
require_once JPATH_COMPONENT.DS.'controller.php';

// Initialize the controller
$controller = new GalleryController();
$controller->execute( null );

// Redirect if set by the controller
$controller->redirect();
?>