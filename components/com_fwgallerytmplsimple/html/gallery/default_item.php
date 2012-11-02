<?php
/**
 * fwgallerytmplsimple 1.3.0
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined( '_JEXEC' ) or die( 'Restricted access' );

$link = $this->params->get('hide_single_image_view')?(JURI::root(true).'/'.JFHelper::getFileFilename($this->row, '')):JRoute::_('index.php?option=com_fwgallery&view=image&id='.$this->row->id.':'.JFilterOutput :: stringURLSafe($this->row->name).'&Itemid='.JFHelper :: getItemid('image', $this->row->id, JRequest :: getInt('Itemid')).'#fwgallerytop');
$color_displayed = false;

$styles = array();
if ($this->image_height) $styles[] = 'height:'.$this->image_height.'px;';

?>
<div id="fwgallery-image-<?php echo $this->row->id; ?>" class="fwgallery-<?php echo $this->row->_plugin_name; ?>">
	<table class="fwg-wrapper">
		<tr>
			<td class="fwg-wrapper-top-left"></td>
			<td class="fwg-wrapper-top-middle"></td>
			<td class="fwg-wrapper-top-right"></td>
		</tr>
		<tr>
			<td class="fwg-wrapper-body-left"></td>
			<td class="fwg-wrapper-body-middle">
	<div class="fwg-image"<?php if ($styles) { ?> style="<?php echo implode('', $styles); ?>"<?php } ?>><a href="<?php echo $link; ?>"<?php if ($this->params->get('hide_single_image_view')) { ?> class="fwg-lightbox" rel="fwg-lightbox-gallery-link"<?php } ?>><img src="<?php echo JURI::root(true).'/'.JFHelper::getFileFilename($this->row, 'mid'); ?>" alt="<?php echo JFHelper :: escape($this->row->name); ?>" <?php echo JFHelper :: getCenteringStyle($this->row, 'mid', 0, $this->image_height); ?>/></a><?php if (!$this->params->get('hide_mignifier')) { ?><div class="fwg-zoom"><a class="fwg-lightbox" href="<?php echo JURI::base(false).JFHelper::getFileFilename($this->row); ?>" rel="fwg-lightbox-gallery" title="<?php echo htmlspecialchars($this->row->name); ?>" class="effectable"><img src="<?php echo JURI :: root(true); ?>/components/com_fwgallery/assets/images/zoom.png" /></a></div><?php } ?></div>
<?php
if ($this->params->get('display_name_image')) {
?>
    <div class="fwg-name" style="background-color:#<?php echo JFHelper :: getGalleryColor($this->row->project_id); ?>;">
 		<?php if (!$this->params->get('hide_single_image_view')) { ?><a href="<?php echo $link; ?>"><?php } ?>
	       	<?php echo ($this->row->name) ? $this->row->name : JText::_('View image'); ?>
		<?php if (!$this->params->get('hide_single_image_view')) { ?></a><?php } ?>
    </div>
<?php
	$color_displayed = true;
}
if ($this->params->get('display_date_image') and $date = JFHelper::encodeDate($this->row->created)) {
?>
    <div class="fwg-date"<?php if (!$color_displayed) { ?> style="background-color:#<?php echo JFHelper :: getGalleryColor($this->row->project_id); ?>;"<?php $color_displayed = true; } ?>>
    	<?php echo $date; ?>
    </div>
<?php
}
if ($this->params->get('display_owner_image') and $this->row->_user_name) {
?>
    <div class="fwg-author"<?php if (!$color_displayed) { ?> style="background-color:#<?php echo JFHelper :: getGalleryColor($this->row->project_id); ?>;"<?php $color_displayed = true; } ?>>
        <?php echo JText::_('by')." ".$this->row->_user_name; ?>
    </div>
<?php
}
if ($this->params->get('use_voting')) {
?>
	<div class="fwg-vote" id="rating<?php echo $this->row->id ?>">
<?php
		include(dirname(__FILE__).'/default_vote.php');
?>
    </div>
<?php
}
if (!empty($this->new_days)) {
	$date_diff = floor((time() - strtotime($this->row->created))/86400);
	if ($date_diff <= $this->new_days) {
?>
    <div class="fwg-new"></div>
<?php
	}
}

$dispatcher =& JDispatcher::getInstance();
JPluginHelper :: importPlugin('fwgallery');
if ($buff = $dispatcher->trigger('loadFrontendImage', array($this->row))) foreach ($buff as $plg) if ($plg) {
?>
	<div class="fwg-plugins"><?php echo $plg; ?></div>
<?php
}
?>
			</td>
			<td class="fwg-wrapper-body-right"></td>
		</tr>
		<tr>
			<td class="fwg-wrapper-bottom-left"></td>
			<td class="fwg-wrapper-bottom-middle"></td>
			<td class="fwg-wrapper-bottom-right"></td>
		</tr>
	</table>
</div>
