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
        $app =& JFactory::getApplication();
        $user =& JFactory::getUser();

        /* collect data for a template */
        $this->assignRef('obj', $model->getObj());
        if (!$this->obj->id) {
        	$app->redirect(
        		JRoute :: _('index.php?option=com_fwgallery&view=galleries&Itemid='.JFHelper :: getItemid('galleries'), false)
    		);
        } elseif ($this->obj->gid and ((JFHelper::isJoomla16() and !in_array($this->obj->gid, $user->groups)) or (!JFHelper::isJoomla16() and $this->obj->gid != $user->gid))) {
        	$app->redirect(
        		JRoute :: _('index.php?option=com_fwgallery&view=galleries&Itemid='.JFHelper :: getItemid('galleries'), false),
        		JText :: _('FWG_GALLERY_ACCESS_DENIED')
    		);
        } elseif (!$this->obj->published) {
        	$app->redirect(
        		JRoute :: _('index.php?option=com_fwgallery&view=galleries&Itemid='.JFHelper :: getItemid('galleries'), false),
        		JText :: _('FWG_GALLERY_NOT_PUBLISHED')
    		);
        }

        $this->assign('own', $user->id and (!JRequest::getInt('id') or $user->id == $this->obj->user_id));
		$this->assignRef('params',  JComponentHelper :: getParams('com_fwgallery'));

        $menu = JMenu :: getInstance('site');
        $active_menu_item = $menu->getActive();

        $pathway =& $app->getPathway();

		if (!$active_menu_item or ($active_menu_item and strpos($active_menu_item->link, 'galleries') === false ) and $this->params->get('id') != $this->obj->id) {
	        $pathway->addItem(JText::_('FWG_GALLERIES'), JRoute::_('index.php?option=com_fwgallery&view=galleries'));
		}

		$this->assignRef('path', $model->loadCategoriesPath($this->obj->parent));
        if ($this->path and $this->params->get('id') != $this->obj->id){
        	 foreach ($this->path as $item) {
        	 	$pathway->addItem($item->name, JRoute::_('index.php?option=com_fwgallery&view=gallery&id='.$item->id.':'.JFilterOutput :: stringURLSafe($item->name).'&Itemid='.JFHelper :: getItemid('gallery', $item->id, JRequest :: getInt('Itemid'))).'#fwgallerytop');
        	 }
        }
        if ($this->params->get('id') != $this->obj->id) $pathway->addItem($this->obj->name);

        $this->setLayout('default');
        $this->assignRef('order', $model->getUserState('order', $this->params->get('ordering_images')));
        $this->assignRef('subcategory_order', $model->getUserState('subcategory_order', $this->params->get('ordering_galleries')));
        $this->assignRef('subcategories', $model->loadSubCategories());
        $this->assignRef('gpagination', $model->getGPagination());
        $this->assignRef('list', $model->getList());
        $this->assignRef('pagination', $model->getPagination());
        $this->assignRef('user', $user);

        parent::display($tmpl);
    }
    function vote() {
        $model = $this->getModel();
        $user =& JFactory::getUser();
        $model->vote();

        $this->assignRef('user', $user);
        $this->assignRef('row', $model->getImage());
        $this->assignRef('msg', $model->getError());
        $this->assign('own', $user->id and (!JRequest::getInt('id') or $user->id == $this->row->_user_id));
		$this->assignRef('params',  JComponentHelper :: getParams('com_fwgallery'));
        $this->setLayout('default_vote');
        parent :: display();

    }
}
?>