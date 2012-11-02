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
        $user =& JFactory::getUser();

        $this->assignRef('obj', $model->getObj());
        $this->assign('own', (bool)$user->id and ($user->id == $this->obj->id));
        $this->assignRef('list', $model->getList());
        $this->assignRef('pagination', $model->getPagination());
        $this->assignRef('title', $model->getTitle());
		$this->assignRef('params',  JComponentHelper :: getParams('com_fwgallery'));
        $this->assignRef('order', $model->getUserState('order', $this->params->get('ordering_galleries')));

        if ($this->obj->id) {
            /* set correct breadcrump */
            $app =& JFactory::getApplication();
            $pathway =& $app->getPathway();
            $pathway->addItem('Galleries');
        }

        parent::display($tmpl);
    }
}
?>