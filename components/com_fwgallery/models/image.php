<?php
/**
 * FW Gallery 2.0.0
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined( '_JEXEC' ) or die( 'Restricted access' );

class fwGalleryModelImage extends JModel {
    function getUserState($name, $def='', $type='cmd') {
        $mainframe =& JFactory :: getApplication();
        $context = 'com_fwgallery.image.'.(int)$this->getImageId().'.';
        return $mainframe->getUserStateFromRequest($context.$name, $name, $def, $type);
    }

    function getImageId() {
    	$id = (int)JRequest :: getInt('id');
    	if (!$id) {
    		if (JFHelper :: isJoomla16()) {
				$menu = JMenu :: getInstance('site');
				if ($item = $menu->getActive()) {
		    		$id = $item->params->get('id');
				}
    		} else {
	    		$params = JComponentHelper :: getParams('com_fwgallery');
	    		$id = $params->get('id');
    		}
    	}
    	return $id;
    }

    function getObj($id = null) {
        $obj = $this->getTable('file');
        if (is_null($id)) {
        	$id = $this->getImageId();
        	$is_image_hit = true;
        } else $is_image_hit = false;
        if ($id and $obj->load($id)) {
        	if (!$obj->_is_gallery_published) $obj->id = 0;
        	elseif ($is_image_hit) $obj->hit();
        }
        return $obj;
    }

    function getNextImage($image) {
    	return JArrayHelper :: getValue($this->_getGalleryImages($image), 1);
    }
    function getPreviousImage($image) {
    	return JArrayHelper :: getValue($this->_getGalleryImages($image), 0);
    }
    function _getGalleryImages($current_image) {
    	static $list = null;
    	if (!$list) {
    		$galleryModel = JModel :: getInstance('gallery', 'fwGalleryModel');
    		$db =& JFactory :: getDBO();
			$db->setQuery('
SELECT
	f.id,
	f.name,
    f.filename,
	t.name AS _type_name,
	t.plugin AS _plugin_name,
	(SELECT user_id FROM #__fwg_projects AS p WHERE p.id = f.project_id) AS _user_id
FROM
    #__fwg_files AS f
	LEFT JOIN #__fwg_projects AS p ON p.id = f.project_id
	LEFT JOIN #__fwg_types AS t ON t.id = f.type_id
WHERE
	p.published = 1
	AND
    f.published = 1
    AND
    f.project_id = '.(int)$current_image->project_id.'
'.$galleryModel->_getOrderClause());
			$list = array();
    		if ($images = $db->loadObjectList()) {
    			$qty = count($images);
    			if ($qty > 1) {
	    			/* look for current image position */
	    			foreach ($images as $pos => $image) {
	    				if ($image->id == $current_image->id) {
	    					if (!$pos) {
	    						$list[] = $images[$qty - 1];
	    						if ($qty > 1) $list[] = $images[1];
	    					} elseif ($pos == $qty - 1) {
	    						if ($qty > 1) $list[] = $images[$pos - 1];
	    						$list[] = $images[0];
	    					} else {
	    						$list[] = $images[$pos - 1];
	    						$list[] = $images[$pos + 1];
	    					}
							break;
	    				}
	    			}
    			}
    		}
    	}
    	return $list;
    }
    function loadCommentingSystem($row) {
		$dispatcher =& JDispatcher::getInstance();
		JPluginHelper :: importPlugin('fwgallery');
		$commenting_systems = $dispatcher->trigger('fwLoadComments', array($row));
    	if (is_array($commenting_systems) and $commenting_systems) return array_shift($commenting_systems);
    }
    function loadFrontendImagePlugins($row) {
		$dispatcher =& JDispatcher::getInstance();
		JPluginHelper :: importPlugin('fwgallery');
		return $dispatcher->trigger('loadFrontendImage', array($row));
    }
    function loadCategoriesPath($category_id = 0) {
    	$model = JModel :: getInstance('gallery', 'fwGalleryModel');
    	return $model->loadCategoriesPath($category_id);
    }
    function getPluginOutput($row) {
		$dispatcher =& JDispatcher::getInstance();
		JPluginHelper :: importPlugin('fwgallery');
		$output = $dispatcher->trigger('getFrontendFileTypeOutput', array($row));
    	if (is_array($output) and $output) return array_shift($output);
    }
	function getPlugin() {
		if ($plugin = JRequest :: getString('plugin'))
			return JPluginHelper :: getPlugin('fwgallery', $plugin);
	}
	function processPlugin() {
		if ($plugin = $this->getPlugin() and JPluginHelper :: importPlugin('fwgallery', $plugin->name)) {
			$dispatcher =& JDispatcher::getInstance();
			$result = $dispatcher->trigger('fwProcess');
		}
	}
	function save() {
		$user = JFactory :: getUser();
		if (!$user->id) {
			$app = JFactory :: getApplication();
			$app->login(JRequest :: get(), array(
				'silent' => true
			));
		}
		$user = JFactory :: getUser();
		if ($user->id) {
	        $image = $this->getTable('file');
	        if ($id = JRequest::getInt('id') and !$image->load($id)) JRequest :: setVar('id', 0);

	        if ($image->bind(JRequest::get('default', JREQUEST_ALLOWHTML)) and $image->check() and $image->store()) {
	            $this->setError('FWG_STORED_SUCCESSFULLY');
	            return $image->id;
	        } else
	        	$this->setError($image->getError());
		} else
			$this->setError('FWG_CANT_LOGIN');
	}
	function delete() {
		$user = JFactory :: getUser();
		if (!$user->id) {
			$app = JFactory :: getApplication();
			$app->login(JRequest :: get(), array(
				'silent' => true
			));
		}
		$user = JFactory :: getUser();
		$result = false;
		if ($user->id) {
			$id = JRequest :: getInt('id');
			$advanced_user = 0;
			if (JFHelper :: isJoomla16()) {
				$advanced_user = $user->authorise('core.login.admin')?1:0;
			} else {
				$advanced_user = ($user->gid > 22 and $user->gid < 26)?1:0;
			}
			$image = $this->getTable('file');
			if ($image->load($id)) {
				if ($advanced_user) {
					$result = $image->delete($id);
					$this->setError($result?'FWG_SUCCESS':$image->getError());
				} else {
					if ($image->user_id == $user->id) {
						$result = $image->delete($id);
						$this->setError($result?'FWG_SUCCESS':$image->getError());
					} else $this->setError('FWG_NOT_YOURS');
				}
			} else $this->setError('FWG_NOT_FOUND');
		} else $this->setError('FWG_CANT_LOGIN');
		return $result;
	}
	function testGallery() {
		$result = new stdclass;
		$filename = JPATH_ADMINISTRATOR.'/components/com_fwgallery/fwgallery.xml';
		if (file_exists($filename) and $buff = file_get_contents($filename)) {
			if (preg_match('#<version>([^<]*)</version>#', $buff, $match)) {
				$result->code = 2;
				$result->version = $match[1];
			} else {
				$result->code = 1;
				$result->msg = JText :: _('FW Gallery version not found');
			}
		} else {
			$result->code = 0;
			$result->msg = JText :: _('FW Gallery config file not found');
		}

		return $result;
	}
	function testUser() {
		$result = new stdclass;
		$result->code = 0;
		$result->advanced_user = 0;
		$result->msg = '';
		if ($pass = JRequest :: getString('password')) {
			if ($username = JRequest :: getString('username')) {
				$result->code = 2;
				$db = JFactory :: getDBO();
				$db->setQuery('SELECT `id`, `password` FROM #__users WHERE username = '.$db->quote($username));
				if ($obj = $db->loadObject()) {
					$parts = explode( ':', $obj->password );
					$crypt = $parts[0];
					$salt = JArrayHelper :: getValue($parts, 1);
					jimport('joomla.user.helper');
					$testcrypt = JUserHelper :: getCryptedPassword($pass, $salt);
					if ($crypt == $testcrypt) {
						$result->code = 5;
						$user = JFactory :: getUser($obj->id);
						if (JFHelper :: isJoomla16()) {
							$result->advanced_user = $user->authorise('core.login.admin')?1:0;
						} else {
							$result->advanced_user = ($user->gid > 22 and $user->gid < 26)?1:0;
						}
						$result->msg = JText :: _('User ok');
					} else {
						$result->code = 4;
						$result->msg = JText :: _('Password do not match');
					}
				} else {
					$result->code = 3;
					$result->msg = JText :: _('User not found');
				}
			} else {
				$result->code = 1;
				$result->msg = JText :: _('Username not passed');
			}
		} else {
			$result->code = 0;
			$result->msg = JText :: _('Password not passed');
		}
		return $result;
	}
	function getPlugins() {
		$user = JFactory :: getUser();
		if (!$user->id) {
			$app = JFactory :: getApplication();
			$app->login(JRequest :: get(), array(
				'silent' => true
			));
		}
		$user = JFactory :: getUser();
		$result = false;
		if ($user->id) {
			$advanced_user = 0;
			if (JFHelper :: isJoomla16()) {
				$advanced_user = $user->authorise('core.login.admin')?1:0;
			} else {
				$advanced_user = ($user->gid > 22 and $user->gid < 26)?1:0;
			}
			if ($advanced_user) {
				$db =& JFactory :: getDBO();
				if (JFHelper :: isJoomla16()) {
					$db->setQuery('SELECT \'\' AS name, element, folder AS `type`, enabled AS published, \'\' AS `version` FROM #__extensions WHERE `type` = \'plugin\' AND (`folder` = \'fwgallery\' OR `name` LIKE \'%FW Gallery%\') ORDER BY ordering');
				} else {
					$db->setQuery('SELECT \'\' AS name, element, folder AS `type`, published, \'\' AS `version` FROM #__plugins WHERE `folder` = \'fwgallery\' OR `name` LIKE \'%FW Gallery%\' ORDER BY ordering');
				}
				if ($plugins = $db->loadObjectList()) foreach ($plugins as $i=>$plugin) {
					$filename = JPATH_PLUGINS.'/'.$plugin->type.'/'.(JFHelper :: isJoomla16()?($plugin->element.'/'):'').$plugin->element.'.xml';
					if (file_exists($filename)) {
						$file = file_get_contents($filename);
						if (preg_match('#<name>(.*?)</name>#i', $file, $m)) $plugins[$i]->name = $m[1];
						if (preg_match('#<version>(.*?)</version>#i', $file, $m)) $plugins[$i]->version = $m[1];
					}
					return $plugins;
				}
			} else $this->setError('FWG_NO_ACCESS');
		} else $this->setError('FWG_CANT_LOGIN');
		return $result;
	}
}
?>