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


class GalleryModelGallery extends JModel {
    /**
	 * Constructor
	 */
	function getData($limit, $id)
    {
		
		if($limit){
            $query = " SELECT * FROM jml_fwg_files where published = 1 and project_id = '$id'  order by id DESC LIMIT $limit,23 ";
		}
			else{
			 $query = " SELECT * FROM jml_fwg_files where published = 1 and project_id = '$id'  order by id DESC LIMIT 0,23";	
		}

		$datos = $this->_getList( $query );
		return $datos;

    }
	
	function getGallery($id)
    {
		$query = " SELECT * FROM jml_fwg_projects where published = 1 and id = '$id' order by id DESC LIMIT 1";	
		$datos = $this->_getList( $query );
		return $datos;

    }
	
	function Totalitems($id)
    {
     
            $query = " SELECT COUNT(*) AS total FROM jml_fwg_files where published = 1 and project_id = '$id' ";
 
            $consulta = $this->_getList( $query );
			

 
        return $consulta;
    }
	
	
}
?>