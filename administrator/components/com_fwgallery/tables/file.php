<?php
/**
 * FW Gallery 2.0.0
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined( '_JEXEC' ) or die( 'Restricted access' );

class TableFile extends JTable {
    var $id = null,
    	$ordering = null,
    	$published = 1,
    	$project_id = null,
    	$type_id = 1,
    	$user_id = null,
    	$created = null,
    	$name = null,
    	$descr = null,
    	$filename = null,
    	$selected = 0,
    	$hits = 0,
    	$longitude = null,
    	$latitude = null,
    	$media = null,
    	$media_code = null,
    	$copyright = null;

    var $_user_id = 0,
    	$_user_name = '',
    	$_type_name = '',
    	$_plugin_name = '',
    	$_is_type_published = '',
    	$_gallery_name = '',
    	$_is_gallery_published = '',
    	$_rating_sum = 0,
    	$_rating_count = 0,
    	$_rating_value = 0,
    	$_is_voted = 0,
    	$_color = null;

    function __construct(&$db) {
        parent::__construct('#__fwg_files', 'id', $db);
    }

    function load($oid, $user_id = null) {
        if ($oid and is_numeric($oid)) {
        	$db =& JFactory :: getDBO();
        	$user =& JFactory :: getUser();
	        $params = JComponentHelper :: getParams('com_fwgallery');
	        $app = JFactory :: getApplication();

        	$db->setQuery('
SELECT
	f.*,
	u.name AS _user_name,
	p.user_id AS _user_id,
	p.color AS _color,
	p.name AS _gallery_name,
	p.published AS _is_gallery_published,
	t.name AS _type_name,
	t.plugin AS _plugin_name,
	t.published AS _is_type_published,
	CASE WHEN (SELECT COUNT(*) FROM #__fwg_files_vote AS v LEFT JOIN #__users AS u ON u.id = v.user_id WHERE v.file_id = f.id AND ((u.id IS NULL AND v.user_id = 0) OR (u.id IS NOT NULL AND v.user_id <> 0))) > 0 THEN (SELECT SUM(v.value) FROM #__fwg_files_vote AS v LEFT JOIN #__users AS u ON u.id = v.user_id WHERE v.file_id = f.id AND ((u.id IS NULL AND v.user_id = 0) OR (u.id IS NOT NULL AND v.user_id <> 0)))/(SELECT COUNT(*) FROM #__fwg_files_vote AS v LEFT JOIN #__users AS u ON u.id = v.user_id WHERE v.file_id = f.id AND ((u.id IS NULL AND v.user_id = 0) OR (u.id IS NOT NULL AND v.user_id <> 0))) ELSE 0 END AS _rating_value,
	(SELECT SUM(v.value) FROM #__fwg_files_vote AS v LEFT JOIN #__users AS u ON u.id = v.user_id WHERE v.file_id = f.id AND ((u.id IS NULL AND v.user_id = 0) OR (u.id IS NOT NULL AND v.user_id <> 0))) AS _rating_sum,
	(SELECT COUNT(*) FROM #__fwg_files_vote AS v LEFT JOIN #__users AS u ON u.id = v.user_id WHERE v.file_id = f.id AND ((u.id IS NULL AND v.user_id = 0) OR (u.id IS NOT NULL AND v.user_id <> 0))) AS _rating_count,
'.($user->id?(
'	(SELECT COUNT(*) FROM #__fwg_files_vote AS v WHERE v.file_id = f.id AND v.user_id = '.(int)$user->id.') AS _is_voted'
):(
	$params->get('public_voting')?(
'	(SELECT COUNT(*) FROM #__fwg_files_vote AS v WHERE v.file_id = f.id AND v.ipaddr = '.(int)ip2long(JFHelper :: getIP()).') AS _is_voted'
	):(
'	1 AS _is_voted'
	)
)).'
FROM
	#__fwg_files AS f
	LEFT JOIN #__users AS u ON u.id = f.user_id
	LEFT JOIN #__fwg_projects AS p ON p.id = f.project_id
	LEFT JOIN #__fwg_types AS t ON t.id = f.type_id
    LEFT JOIN #__'.(JFHelper::isJoomla16()?'usergroups':'core_acl_aro_groups').' AS pg ON (pg.id = p.gid)
WHERE
	'.($app->isSite()?('(
		p.gid = 0
		OR
		p.gid IS NULL
'.($user->id?('
		OR
		pg.lft = (SELECT ug.lft FROM #__'.(JFHelper::isJoomla16()?'usergroups':'core_acl_aro_groups').' AS ug WHERE ug.id IN ('.(JFHelper::isJoomla16()?implode(',',$user->groups):$user->gid).'))'):'').'
	)
	AND
	'):'').'
	f.id = '.(int)$oid
			);
			if ($obj = $db->loadObject()) {
				if (!$user_id or ($user_id and $user_id == $obj->user_id)) {
					foreach ($obj as $key=>$val) $this->$key = $val;

					$dispatcher =& JDispatcher::getInstance();
					JPluginHelper :: importPlugin('fwgallery');
					$dispatcher->trigger('handleFileLoad', array(&$this));

		            return true;
				} else $this->setError(JText :: _('FWG_REQUESTED_FILE_IS_NOT_YOURS'));
			} else $this->setError(JText :: _('FWG_REQUESTED_FILE_NOT_FOUND_OR_ACCESS_DENIED'));
        }
    }

    function clockwise($cid, $user_id = null) {
    	if ($cid) foreach ($cid as $id) if ($this->load((int)$id, $user_id) and JFHelper :: isFileExists($this)) {
            $img_path = FWG_STORAGE_PATH.'files'.'/'.$this->_user_id.'/';
    		GPMiniImg :: rotate($img_path, 'th_'.$this->filename, 270);
    		GPMiniImg :: rotate($img_path, 'mid_'.$this->filename, 270);
    		GPMiniImg :: rotate($img_path, $this->filename, 270);
    	}
    }

    function counterclockwise($cid, $user_id = null) {
    	if ($cid) foreach ($cid as $id) if ($this->load((int)$id, $user_id) and JFHelper :: isFileExists($this)) {
            $img_path = FWG_STORAGE_PATH.'files'.'/'.$this->_user_id.'/';
    		GPMiniImg :: rotate($img_path, 'th_'.$this->filename, 90);
    		GPMiniImg :: rotate($img_path, 'mid_'.$this->filename, 90);
    		GPMiniImg :: rotate($img_path, $this->filename, 90);
    	}
    }

    function select($cid, $user_id = null) {
        if ($id = JArrayHelper::getValue($cid, 0)) {
            if ($this->load($id, $user_id)) {
		    	$db =& JFactory :: getDBO();
                $db->setQuery('UPDATE #__fwg_files SET selected = 0 WHERE project_id = '.(int)$this->project_id);
                $db->query();

                $this->selected = 1;
                return $this->store();
            }
        }
    }

    function unselect($cid, $user_id = null) {
        if ($id = JArrayHelper::getValue($cid, 0)) {
            if ($this->load($id, $user_id)) {
                $this->selected = 0;
                return $this->store();
            }
        }
        return false;
    }

    function check() {
        if (parent::check()) {
	    	$db =& JFactory :: getDBO();
	    	if (!$this->id) {
/* storing user_id */
	    		 if (!$this->user_id) {
	    		 	$user =& JFactory :: getUser();
	    		 	$this->user_id = $user->id;
	    		 }
	    		 if (!$this->ordering) {
			        $db->setQuery('SELECT MAX(ordering) FROM #__fwg_files AS f WHERE f.project_id = '.(int)$this->project_id);
			        $this->ordering = $db->loadResult()+1;
	    		 }
	    	}
/* checking selected */
            $this->selected = JRequest::getInt('selected');
            if ($this->selected) {
                $db->setQuery('UPDATE #__fwg_files SET selected=0 WHERE project_id = '.(int)$this->project_id);
                $db->query();
            }
/* file upload */
            if ($file = JArrayHelper :: getValue($_FILES, 'filename') and JArrayHelper :: getValue($file, 'name') and !JArrayHelper :: getValue($file, 'error')) {
                $old_filename = $this->filename;

                $db->setQuery('SELECT p.user_id FROM #__fwg_projects AS p WHERE p.id = '.(int)$this->project_id);
                $img_path = FWG_STORAGE_PATH.'files'.'/'.$db->loadResult().'/';
                $conf = JComponentHelper::getParams('com_fwgallery');

				if ($conf->get('use_watermark')) {
	                $wmfile = ($conf->get('watermark_file') and file_exists(FWG_STORAGE_PATH.'/'.$conf->get('watermark_file')))?(FWG_STORAGE.'/'.$conf->get('watermark_file')):'';
					$wmtext = $conf->get('watermark_text');
				} else {
					$wmfile = '';
					$wmtext = '';
				}

                $this->filename = GPMiniImg::imageProcessing('filename', $img_path, $conf->get('im_max_w',800), $conf->get('im_max_h',600), $wmfile, $wmtext, $conf->get('watermark_position'));
                GPMiniImg::makeThumb($this->filename, $img_path, 'mid_', $conf->get('im_mid_w',340), $conf->get('im_mid_h',255), $conf->get('im_just_shrink'));
                GPMiniImg::makeThumb($this->filename, $img_path, 'th_', $conf->get('im_th_w',160), $conf->get('im_th_h',120), $conf->get('im_just_shrink'));
				if ($this->filename) {
					if (function_exists('exif_read_data') and $exif = @exif_read_data($file['tmp_name'])) {
/* geotags */
						if ($longitude = JArrayHelper :: getValue($exif, 'GPSLongitude') and $longitude_ref = JArrayHelper :: getValue($exif, 'GPSLongitudeRef')) $this->longitude = JFHelper :: getGps($longitude, $longitude_ref);
						if ($latitude = JArrayHelper :: getValue($exif, 'GPSLatitude') and $latitude_ref = JArrayHelper :: getValue($exif, 'GPSLatitudeRef')) $this->latitude = JFHelper :: getGps($latitude, $latitude_ref);
/* copyright */
						if ($copyright = JArrayHelper :: getValue($exif, 'Copyright')) $this->copyright = $copyright;
						if ($date = JArrayHelper :: getValue($exif, 'DateTime')) $this->created = date('Y-m-d H:i:s', strtotime($date));
					}
/* remove previous images */
	                if ($old_filename and $old_filename != $this->filename) {
	                    @unlink($img_path.$old_filename);
	                    @unlink($img_path.'mid_'.$old_filename);
	                    @unlink($img_path.'th_'.$old_filename);
	                }
				}
            }
            return true;
        }
        return false;
    }

    function store($upd=null) {
    	if (parent :: store($upd)) {
			$dispatcher =& JDispatcher::getInstance();
			JPluginHelper :: importPlugin('fwgallery');
			$dispatcher->trigger('handleFileStore', array($this));
    		return true;
    	}
    }

    function delete($oid = null, $user_id = null) {
    	if ($this->load($oid, $user_id)) {
	        if (parent::delete($oid)) {
	        	$db =& JFactory :: getDBO();
	        	$db->setQuery('DELETE FROM #__fwg_files_vote WHERE file_id = '.(int)$oid);
	        	$db->query();
	            if ($this->_user_id) {
	                $path = FWG_STORAGE_PATH.'files'.'/'.$this->_user_id.'/';
	                if (file_exists($path.$this->filename)) {
	                    @unlink($path.$this->filename);
	                    @unlink($path.'mid_'.$this->filename);
	                    @unlink($path.'th_'.$this->filename);
	                }
	            }
				$dispatcher =& JDispatcher::getInstance();
				JPluginHelper :: importPlugin('fwgallery');
				$dispatcher->trigger('handleFileDelete', array($this));
	            return true;
	        }
    	}
    }
}

?>