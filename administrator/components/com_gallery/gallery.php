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

/*
 * Define constants for all pages
 */
define( 'COM_GALLERY_DIR', 'images'.DS.'gallery'.DS );
define( 'COM_GALLERY_BASE', JPATH_ROOT.DS.COM_GALLERY_DIR );
define( 'COM_GALLERY_BASEURL', JURI::root().str_replace( DS, '/', COM_GALLERY_DIR ));

// Require the base controller
require_once JPATH_COMPONENT.DS.'controller.php';

// Require the base controller
require_once JPATH_COMPONENT.DS.'helpers'.DS.'helper.php';

// Initialize the controller
$controller = new GalleryController( );

// Perform the Request task
$controller->execute( JRequest::getCmd('task'));
$controller->redirect();
?>