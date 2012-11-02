<?php
/**
 * FW Gallery 2.0.0
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/
defined( '_JEXEC' ) or die( 'Restricted access' );

?>
<div class="componentheading"><?php echo $this->title; ?></div>
<div id="fwgallery" class="fw-galleries">
<?php
if (!$this->params->get('hide_iphone_app_promo') and JFHelper :: detectIphone()) {
?>
	<div class="fwg-iphone-promo"><img src="<?php echo JURI :: root(true); ?>/components/com_fwgallery/assets/images/iPhoneAppStore_transp_mini.png" /></div>
<?php
}
if ($this->list) {
    $user =& JFactory::getUser();
	$this->row_limit = $this->params->get('galleries_a_row', 3);
	$this->gallery_width = $this->params->get('gallery_box_width');
	if (!$this->gallery_width) $this->gallery_width = $this->params->get('im_th_w');
	$this->gallery_image_height = $this->params->get('im_th_h');

	$this->counter = 1;
?>
    <form action="<?php echo JRoute::_('index.php?option=com_fwgallery&view=galleries&Itemid='.JFHelper :: getItemid()); ?>" method="post" name="adminForm" id="adminForm">
	    <div class="fwgs-header">
<?php
	if ($this->params->get('display_gallery_sorting')) {
?>
			<div class="fwgs-header-ordering">
				<?php echo JText :: _('FWG_ORDER_BY'); ?>: <?php echo JHTML :: _('select.genericlist', array(
					JHTML :: _('select.option', 'name', JText :: _('FWG_ALPHABETICALLY'), 'id', 'name'),
					JHTML :: _('select.option', 'new', JText :: _('FWG_NEWEST_FIRST'), 'id', 'name'),
					JHTML :: _('select.option', 'old', JText :: _('FWG_OLDEST_FIRST'), 'id', 'name'),
					JHTML :: _('select.option', 'order', JText :: _('FWG_ORDERING'), 'id', 'name')
				), 'order', 'onchange="this.form.submit();"', 'id', 'name', $this->order); ?>
			</div>
<?php
	}
    if ($this->params->get('display_total_galleries')) {
?>
		    <div class="fwgs-header-total"><?php echo JText::_('FWG_TOTAL_GALLERIES'); ?>: <?php echo $this->pagination->total; ?></div>
<?php
    }
    if ($this->params->get('display_galleries_limit_selector')) {
?>
	        <div class="fwgs-header-pagination">
	        	<?php echo JText::_('FWG_DISPLAY_LIMIT'); ?>: <?php echo $this->pagination->getLimitBox(); ?>
	        </div>
<?php
    }
?>
	        <div class="clr"></div>
	    </div>
<?php
    foreach ($this->list as $row) {
    	$this->row = $row;
    	echo $this->loadTemplate('item');

        if ($this->counter >= $this->row_limit) {
?>
        	<div class="clr"></div>
<?php
        	$this->counter = 1;
        } else $this->counter++;
    }
?>
		<div class="clr"></div>
        <div class="fwgs-footer-pagination pagination">
        	<?php echo $this->pagination->getPagesLinks(); ?>
        </div>
    </form>
<?php
} else {
    echo JText::_('FWG_NO_GALLERIES_AVAILABLE_FOR_PREVIEW_');
}
?>
</div>
<?php
$this->params = JComponentHelper :: getParams('com_fwgallery');
if (!$this->params->get('hide_fw_copyright')) {
?>
<div id="fwcopy" style="display:block;visibility:visible;text-align:center;font-size:10px;padding:20px 0;">
	<?php echo JText::_("FWG_POWERED_BY"); ?> <a href="http://fastw3b.net/fwgallery.html" target="_blank"><?php echo JText::_("FWG_FW_GALLERY"); ?></a>
</div>
<?php
}
?>