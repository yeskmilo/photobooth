<?php
/**
 * Joomla! 1.5 component gallery
 *
 * @version $Id: view.html.php 2012-10-30 00:42:48 svn $
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

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the gallery component
 */
class GalleryViewSearch extends JView {
	function display($tpl = null) {
        
		$modelo = $this->getModel();
    	$limit = JRequest::getVar('limitstart');
		$busqueda = JRequest::getVar('busqueda');
		$id = JRequest::getVar('id');
		
		
    	$datos = $modelo->getData($limit, $busqueda);
		$cuenta = $modelo->Totalitems($busqueda);
		$cuenta = $cuenta[0]->total;
		$gallery =  $modelo->getGallery($id);
		
		
		$this->assignRef( 'gallery', $gallery[0] );
		
		$this->assignRef( 'datos', $datos );
		$this->assignRef( 'totales', $cuenta );
        parent::display($tpl);
		
    }
}
?>