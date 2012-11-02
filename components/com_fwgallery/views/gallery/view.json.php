<?php
/**
 * FW Gallery 2.0.0
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined( '_JEXEC' ) or die( 'Restricted access' );

class fwGalleryViewGallery extends fwGalleryView {
    function display($tmpl=null) {
        $model = $this->getModel();

        JRequest :: setVar('limit', '0');
        JRequest :: setVar('limitstart', '0');
        $list = array(
        	'images' => array()
        );
        if ($list['images'] = $model->getList()) foreach ($list['images'] as $i=>$row) {
			$list['images'][$i]->link = JURI :: root(false).JFHelper::getFileFilename($row);
			$list['images'][$i]->color = JFHelper :: getGalleryColor($row->project_id);
        }
        echo json_encode($list);
        die();
    }
}
?>