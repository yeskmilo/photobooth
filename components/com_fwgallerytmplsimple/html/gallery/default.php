<?php
/**
 * fwgallerytmplsimple 1.3.0
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined( '_JEXEC' ) or die( 'Restricted access' );

if ($this->path) {
	$item = $this->path[count($this->path) - 1];
	$back_link = 'index.php?option=com_fwgallery&view=gallery&id='.$item->id.':'.JFilterOutput :: stringURLSafe($item->name).'&Itemid='.JFHelper :: getItemid('gallery', $item->id, JRequest :: getInt('Itemid').'#fwgallerytop');
	$back_title = 'Return to parent gallery';
} else {
	$back_link = 'index.php?option=com_fwgallery&view=galleries&Itemid='.JFHelper :: getItemid('galleries', 0, JRequest :: getInt('Itemid'));
	$back_title = 'Return to list of galleries';
}
$id = JRequest :: getString('id');

?>
<div id="fwgallery" class="fw-gallery">
	<a name="fwgallerytop"></a>
<?php
if (!$this->params->get('hide_iphone_app_promo') and JFHelper :: detectIphone()) {
?>
	<div class="fwg-iphone-promo"><img src="<?php echo JURI :: root(true); ?>/components/com_fwgallery/assets/images/iPhoneAppStore_transp_mini.png" /></div>
<?php
}
?>
    <div class="fwg-header-return">
		<a href="<?php echo JRoute::_($back_link); ?>">
			<?php echo JText :: _($back_title); ?>
		</a>
    </div>
	<div class="fwg-title"><?php echo $this->obj->name; ?></div>
	<div class="fwg-description"><?php echo $this->obj->descr; ?></div>
	<form action="<?php echo JRoute :: _('index.php?option=com_fwgallery&view=gallery'.($id?('&id='.$id):'')); ?>" method="post">
<?php
if ($this->subcategories) {
?>
	<div class="fw-galleries fw-subgalleries">
		    <div class="fwgs-header">
<?php
	if ($this->params->get('display_gallery_sorting')) {
?>
			<div class="fwgs-header-ordering">
				<?php echo JText :: _('Order by'); ?>: <?php echo JHTML :: _('select.genericlist', array(
					JHTML :: _('select.option', 'name', JText :: _('Alphabetically'), 'id', 'name'),
					JHTML :: _('select.option', 'new', JText :: _('Newest First'), 'id', 'name'),
					JHTML :: _('select.option', 'old', JText :: _('Oldest First'), 'id', 'name'),
					JHTML :: _('select.option', 'order', JText :: _('Ordering'), 'id', 'name')
				), 'subcategory_order', 'onchange="this.form.submit();"', 'id', 'name', $this->subcategory_order); ?>
			</div>
<?php
	}
    if ($this->params->get('display_total_galleries')) {
?>
			    <div class="fwgs-header-total"><?php echo JText::_('Total sub galleries').': '.$this->gpagination->total; ?></div>
<?php
    }
    if ($this->params->get('display_galleries_limit_selector')) {
?>
	        <div class="fwgs-header-pagination">
	        	<?php echo JText::_('Display limit'); ?>: <?php echo $this->gpagination->getLimitBox(); ?>
	        </div>
<?php
    }
?>
		        <div class="clr"></div>
		    </div>
<?php
	$this->counter = 1;
	$this->row_limit = $this->params->get('galleries_a_row', 3);
	$this->gallery_width = $this->params->get('gallery_box_width');
	if (!$this->gallery_width) $this->gallery_width = $this->params->get('im_th_w');
	$this->gallery_image_height = $this->params->get('im_th_h');

	foreach ($this->subcategories as $row) {
		$this->row = $row;
		if (file_exists(dirname(__FILE__).'/../galleries/default_item.php')) include(dirname(__FILE__).'/../galleries/default_item.php');
		else include(JPATH_SITE.'/components/com_fwgallery/views/galleries/tmpl/default_item.php');

        if ($this->counter >= $this->row_limit) {
?>
        	<div class="clr"></div>
<?php
        	$this->counter = 1;
        } else $this->counter++;
	}
?>
		<div class="clr"></div>
	</div>
    <div class="fwgs-footer-pagination pagination">
    	<?php echo $this->gpagination->getPagesLinks(); ?>
    </div>
<?php
}
if ($this->list) {
	$this->row_limit = $this->params->get('images_a_row', 3);
	$this->image_width = $this->params->get('image_box_width');
	$this->image_height = $this->params->get('im_mid_h');
	if (!$this->image_width) $this->image_width = $this->params->get('im_mid_w');
	$id = JRequest :: getString('id');
?>
	    <div class="fwgs-header">
<?php
if ($this->params->get('display_gallery_sorting')) {
?>
			<div class="fwgs-header-ordering">
				<?php echo JText :: _('Order by'); ?>: <?php echo JHTML :: _('select.genericlist', array(
					JHTML :: _('select.option', 'name', JText :: _('Alphabetically'), 'id', 'name'),
					JHTML :: _('select.option', 'new', JText :: _('Newest First'), 'id', 'name'),
					JHTML :: _('select.option', 'old', JText :: _('Oldest First'), 'id', 'name'),
					JHTML :: _('select.option', 'order', JText :: _('Ordering'), 'id', 'name'),
					JHTML :: _('select.option', 'voting', JText :: _('FWG_VOTING'), 'id', 'name')
				), 'order', 'onchange="this.form.submit();"', 'id', 'name', $this->order); ?>
			</div>
<?php
}
if ($this->params->get('display_gallery_limit_selector')) {
?>
	        <div class="fwgs-header-pagination">
	        	<?php echo JText::_('Display limit'); ?>: <?php echo $this->pagination->getLimitBox(); ?>
	        </div>
<?php
}
?>
	        <div class="clr"></div>
	    </div>
		<div class="fwg-images">
<?php
	$this->new_days = $this->params->get('new_days');
	$this->counter = 1;
    foreach ($this->list as $row) {
    	$this->row = $row;
		$styles = array();
		if ($this->counter == $this->row_limit) $styles[] = 'margin-right: 0;';
		if ($this->image_width) $styles[] = 'width:'.$this->image_width.'px;';
?>
		<div class="fwg-item"<?php if ($styles) { ?> style="<?php echo implode('', $styles); ?>"<?php } ?>>
<?php
    		echo $this->loadTemplate('item');
?>
		</div>
<?php
        if ($this->counter >= $this->row_limit) {
?>
        	<div class="clr"></div>
<?php
        	$this->counter = 1;
        } else $this->counter++;
    }
	if ($this->counter > 1) {
?>
	<div class="clr"></div>
<?php
	}
?>
    	</div>
        <div class="fwgs-footer-pagination">
        	<?php echo $this->pagination->getPagesLinks(); ?>
        </div>
	</form>
<?php
	if (!defined('FWGALLERY_LIGHTBOX_LOADED')) {
		define('FWGALLERY_LIGHTBOX_LOADED', true);
		echo $this->loadTemplate('scripts');
	}
} else {
    echo JText::_('No images in this gallery.');
}
?>
</div>
<?php
if (!$this->params->get('hide_fw_copyright')) {
?>
<div id="fwcopy" style="display:block;visibility:visible;text-align:center;font-size:10px;padding:20px 0;">
	<?php echo JText::_("Powered by"); ?> <a href="http://fastw3b.net/fwgallery.html" target="_blank"><?php echo JText::_("FW Gallery"); ?></a>
</div>
<?php
}
?>
