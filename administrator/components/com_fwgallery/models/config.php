<?php
/**
 * FW Gallery 2.0
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined( '_JEXEC' ) or die( 'Restricted access' );

class fwGalleryModelConfig extends JModel {
    function loadObj() {
    	$obj = new stdclass;
    	$obj->params = JComponentHelper :: getParams('com_fwgallery');
        return $obj;
    }
    function getPlugins($config) {
		$dispatcher =& JDispatcher::getInstance();
		JPluginHelper :: importPlugin('fwgallery');
		return $dispatcher->trigger('getAdminConfig', array($config));
    }
    function getFormPlugins($config) {
		$dispatcher =& JDispatcher::getInstance();
		JPluginHelper :: importPlugin('fwgallery');
		return $dispatcher->trigger('getAdminConfigForm', array($config));
    }

    function save() {
    	$params = JComponentHelper :: getParams('com_fwgallery');
    	$params->loadArray((array)JRequest :: getVar('config'));

		$cache = JFactory :: getCache('_system', 'callback');
    	$cache->clean();

    	$params->setValue('gallery_color', trim($params->getValue('gallery_color'), '#'));
    	if (!$params->getValue('gallery_box_width')) $params->setValue('gallery_box_width', $params->getValue('im_th_w'));
    	if (!$params->getValue('image_box_width')) $params->setValue('image_box_width', $params->getValue('im_mid_w'));

		if (JRequest :: getInt('delete_watermark') and $filename = $params->get('watermark_file')) {
			if (file_exists(FWG_STORAGE_PATH.$filename)) @unlink(FWG_STORAGE_PATH.$filename);
			$params->setValue('watermark_file', '');
		}

    	if ($file = JRequest :: getVar('watermark_file', '', 'files')
    	 and $name = JArrayHelper :: getValue($file, 'name')
    	  and !JArrayHelper :: getValue($file, 'error')
    	   and preg_match('/\.png|gif$/i', $name)
    	   	and move_uploaded_file(JArrayHelper :: getValue($file, 'tmp_name'), FWG_STORAGE_PATH.$name)) {
    		$params->setValue('watermark_file', $name);
    	}

		$dispatcher =& JDispatcher::getInstance();
		JPluginHelper :: importPlugin('fwgallery');
		$dispatcher->trigger('handleConfigStore', array($params));

    	$db =& JFactory :: getDBO();
    	if (JFHelper :: isJoomla16()) {
	    	$db->setQuery('UPDATE #__extensions SET params = '.$db->quote($params->toString()).' WHERE `element` = \'com_fwgallery\' AND `type` = \'component\'');
    	} else {
	    	$db->setQuery('UPDATE #__components SET params = '.$db->quote($params->toString()).' WHERE `option` = \'com_fwgallery\' AND `parent` = 0');
    	}
    	return $db->query();
    }
}
?>