<?php
/**
 * FW Gallery 2.0
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined( '_JEXEC' ) or die( 'Restricted access' );

class fwGalleryViewPlugins extends JView {
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
				true
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
				false
			);
		}

        $this->assignRef('plugins', $model->getPlugins());
        $this->assignRef('installed_plugins', $model->getInstalledPlugins());
        $this->assign('fwgallery_plugins_installed', $model->checkGalleryPlugins($this->installed_plugins));
        parent::display($tmpl);
    }

    function edit($tmpl=null) {
        $model = $this->getModel();
        if ($plugin = $model->getPlugin()) {
	        if (!headers_sent()) {
				header("Expires: Tue, 1 Jul 2003 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
				header("Cache-Control: no-store, no-cache, must-revalidate");
				header("Pragma: no-cache");
	        }
	        ob_implicit_flush();
	        $model->processPlugin($plugin);
        }
    }
}
?>