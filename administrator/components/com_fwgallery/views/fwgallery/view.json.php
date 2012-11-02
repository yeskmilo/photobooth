<?php
/**
 * FW Gallery 2.0.0
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined( '_JEXEC' ) or die( 'Restricted access' );

class fwGalleryViewfwGallery extends JView {
    function display($tmpl=null) {
        $model = $this->getModel();

        JRequest :: setVar('limit', '0');
        JRequest :: setVar('limitstart', '0');
        $list = array();
        if ($data = $model->getProjects()) foreach ($data as $row) {
			$buff = new stdclass;
			$buff->id = $row->id;
			$buff->parent = $row->parent;
			$buff->name = $row->name;
			$buff->created = $row->created;
			$buff->link = JURI :: root(false).JFHelper::getFileFilename($row);
			$buff->color = JFHelper :: getGalleryColor($row->id);
			$buff->_user_name = $row->_user_name;

			$list[] = $buff;
        }
        echo json_encode($list);
        die();
    }
}
?>