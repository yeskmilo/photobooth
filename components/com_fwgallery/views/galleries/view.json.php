<?php
/**
 * FW Gallery 2.0.0
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined( '_JEXEC' ) or die( 'Restricted access' );

class fwGalleryViewGalleries extends fwGalleryView {
    function display($tmpl=null) {
        $model = $this->getModel();

        JRequest :: setVar('limit', '0');
        JRequest :: setVar('limitstart', '0');
        if ($data = $model->getAllList()) foreach ($data as $i=>$row) {
			$data[$i]->link = JURI :: root(false).JFHelper::getFileFilename($row);
			$data[$i]->color = JFHelper :: getGalleryColor($row->id);
        }
        echo json_encode($data);
        die();
    }
}
?>