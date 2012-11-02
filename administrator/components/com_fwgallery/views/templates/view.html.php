<?php
/**
 * FW Gallery 2.0
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined( '_JEXEC' ) or die( 'Restricted access' );

class fwGalleryViewTemplates extends JView {
    function display($tmpl=null) {
        $model = $this->getModel();

		if (JFHelper :: isJoomla16()) {
			JSubMenuHelper::addEntry(
				JText::_('FWG_GALLERIES'),
				'index.php?option=com_fwgallery&view=fwgallery',
				false
			);
			JSubMenuHelper::addEntry(
				JText::_('FWG_IMAGES'),
				'index.php?option=com_fwgallery&view=files',
				false
			);
			JSubMenuHelper::addEntry(
				JText::_('FWG_PLUGINS'),
				'index.php?option=com_fwgallery&view=plugins',
				false
			);
			JSubMenuHelper::addEntry(
				JText::_('FWG_TEMPLATES'),
				'index.php?option=com_fwgallery&view=templates',
				true
			);
			JSubMenuHelper::addEntry(
				JText::_('FWG_IPHONE_APP'),
				'index.php?option=com_fwgallery&view=iphone',
				false
			);
			JSubMenuHelper::addEntry(
				JText::_('FWG_CONFIGURATION'),
				'index.php?option=com_fwgallery&view=config',
				false
			);
		}

        $this->assignRef('template', JFHelper :: getCurrentTemplate());
        $this->assignRef('templates', JFHelper :: getTemplates());
        parent::display($tmpl);
    }
}
?>