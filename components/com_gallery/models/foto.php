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

jimport('joomla.application.component.model');


class GalleryModelFoto extends JModel {
    /**
	 * Constructor
	 */
	
	function getFoto($id)
    {
		$query = " SELECT * FROM jml_fwg_files where published = 1 and id = '$id'";	
		$datos = $this->_getList( $query );
		return $datos;

    }
	
	
}
?>