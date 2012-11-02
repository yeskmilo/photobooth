<?php
/**
 * FW Gallery 2.0
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined( '_JEXEC' ) or die( 'Restricted access' );

class fwGalleryViewConfig extends JView {
    function display($tmpl=null) {
        $model = $this->getModel();
		$this->getMenu();
        $this->assignRef('obj', $model->loadObj());
        $this->assignRef('plugins', $model->getPlugins($this->obj));
        parent::display($tmpl);
    }
    function edit($tmpl=null) {
        $model = $this->getModel();
		$this->getMenu();
        $this->assignRef('obj', $model->loadObj());
        $this->assignRef('plugins', $model->getFormPlugins($this->obj));
        parent::display($tmpl);
    }
    function getMenu() {
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
				false
			);
			JSubMenuHelper::addEntry(
				JText::_('FWG_IPHONE_APP'),
				'index.php?option=com_fwgallery&view=iphone',
				false
			);
			JSubMenuHelper::addEntry(
				JText::_('FWG_CONFIGURATION'),
				'index.php?option=com_fwgallery&view=config',
				true
			);
		}
    }
}
?>