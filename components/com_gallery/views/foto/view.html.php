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
class GalleryViewFoto extends JView {
	function display($tpl = null) {
        
		$modelo = $this->getModel();
		$id = JRequest::getVar('id');
		
		$foto = $modelo->getFoto($id);
		
		
		$this->assignRef( 'foto', $foto[0] );
        parent::display($tpl);
		
    }
}
?>