<?php
/**
 * FW Gallery 2.0.0
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined( '_JEXEC' ) or die( 'Restricted access' );

JToolBarHelper::title(JText::_('FWG_IMAGE').'&nbsp;<small>['.JText::_($this->obj->id?'Edit':'New').']</small>', 'fwgallery-image.png');
JToolBarHelper::apply();
JToolBarHelper::save();
JToolBarHelper::cancel('files');
$editor =& JFactory::getEditor();
?>
<form action="index.php?option=com_fwgallery&amp;view=files" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data" class="form-validate">
    <fieldset class="adminform">
        <legend><?php echo JText::_('FWG_DETAILS'); ?></legend>
        <table class="admintable">
	        <tr>
	            <td class="key">
	                <label for="name"><?php echo JText::_('FWG_NAME'); ?> :</label>
	            </td>
	            <td>
	                <input id="name" class="inputbox" type="text" name="name" size="50" maxlength="100" value="<?php echo $this->escape($this->obj->name);?>" />
	            </td>
	        </tr>

            <td class="key">
                <label for="user_id">
                    <?php echo JText::_('FWG_USER'); ?>:
                </label>
            </td>
            <td>
                <?php echo JHTML::_('select.genericlist', (array)$this->clients, 'user_id', 'class="required"', 'id', 'name', $this->obj->user_id?$this->obj->user_id:$this->user->id); ?>
            </td>

	        <tr class="fwgallery_image_field">
	            <td class="key">
	                <label for="selected"><?php echo JText::_('FWG_DEFAULT'); ?>:</label>
	            </td>
	            <td>
	                <input id="selected" type="checkbox" name="selected" value="1"<?php echo $this->obj->selected?' checked':'';?> />
	            </td>
	        </tr>

	        <tr>
	            <td class="key">
	                <label for="published"><?php echo JText::_('FWG_PUBLISHED'); ?>:</label>
	            </td>
	            <td>
                	<?php echo JHTML :: _('select.booleanlist', 'published', '', $this->obj->published); ?>
	            </td>
	        </tr>

	        <tr>
	            <td class="key">
	                <label for="created"><?php echo JText::_('FWG_DATE'); ?>:</label>
	            </td>
	            <td>
	                <?php echo JHTML::_('calendar', substr($this->obj->created?$this->obj->created:date('Y-m-d'), 0, 10), 'created', 'created', '%Y-%m-%d', array('class'=>'inputbox', 'size'=>'25',  'maxlength'=>'19')); ?>
	            </td>
	        </tr>

	        <tr>
	            <td class="key">
	                <label for="longitude"><?php echo JText::_('FWG_LONGITUDE'); ?>:</label>
	            </td>
	            <td>
	                <input id="longitude" class="inputbox" type="text" name="longitude" size="30" maxlength="100" value="<?php echo $this->escape($this->obj->longitude);?>" />
	            </td>
	        </tr>
	        <tr>
	            <td class="key">
	                <label for="latitude"><?php echo JText::_('FWG_LATITUDE'); ?>:</label>
	            </td>
	            <td>
	                <input id="latitude" class="inputbox" type="text" name="latitude" size="30" maxlength="100" value="<?php echo $this->escape($this->obj->latitude);?>" />
	            </td>
	        </tr>
	        <tr>
	            <td class="key">
	                <label for="copyright"><?php echo JText::_('FWG_COPYRIGHT'); ?>:</label>
	            </td>
	            <td>
	                <input id="copyright" class="inputbox" type="text" name="copyright" size="50" maxlength="100" value="<?php echo $this->escape($this->obj->copyright);?>" />
	            </td>
	        </tr>

	        <tr>
	            <td class="key">
	                <label for="project_id"><?php echo JText::_('FWG_GALLERY'); ?>:</label>
	            </td>
	            <td>
	                <?php echo JHTML :: _('fwGalleryCategory.getCategories', 'project_id', $this->obj->project_id, 'class="required"', $multiple=false, $first_option=''); ?>
	            </td>
	        </tr>
<?php
		$dispatcher =& JDispatcher::getInstance();
		JPluginHelper :: importPlugin('fwgallery');
		$dispatcher->trigger('getAdminFileForm', array($this->obj));
?>
	        <tr>
	            <td class="key">
	                <label for="filename"><?php echo JText::_('FWG_FILE'); ?>:</label>
	            </td>
	            <td>
<?php
if (count($this->types) > 1) {
?>
                    <p><?php echo JText :: _('FWG_FILE_UPLOAD_SIZE_LIMIT').' '.ini_get('post_max_size'); ?></p>
					<label for="type_id"><?php echo JText :: _('FWG_FILE_TYPE') ?>:</label> <?php echo JHTML :: _('select.genericlist', $this->types, 'type_id', '', 'id', 'name', $this->obj->type_id); ?>
					<?php $dispatcher->trigger('getAdminFileTypeForm', array($this->obj)); ?>
<?php
}
?>
					<div class="fwg-types" id="fwg-type-1"<?php if ($this->obj->type_id > 1 and $this->obj->_is_type_published) { ?> style="display:none;"<?php } ?>>
		                <img src="<?php echo JURI::root(true).'/'.JFHelper::getFileFilename($this->obj,'mid'); ?>"/><br/>
		                <?php echo JText::_('FWG_FILENAME').':'.$this->obj->filename; ?><br/>
		                <input id="filename" class="inputbox" type="file" name="filename"/>
					</div>
	            </td>
	        </tr>

	        <tr>
	            <td class="key">
	                <label for="descr"><?php echo JText::_('FWG_DESCRIPTION'); ?>:</label>
	            </td>
	            <td>
                    <?php echo $editor->display('descr',  $this->obj->descr, '600', '350', '75', '20', false); ?>
	            </td>
	        </tr>

        </table>
    </fieldset>
	<input type="hidden" name="option" value="com_fwgallery" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="view" value="files" />
	<input type="hidden" name="id" value="<?php echo $this->obj->id; ?>" />
</form>
<script type="text/javascript">
window.addEvent('domready', function() {
	if ($('type_id')) {
		$('type_id').addEvent('change', fwg_check_type);
		$('type_id').addEvent('click', fwg_check_type);
		fwg_check_type();
	}
});
function fwg_check_type() {
	var id = $('type_id').value;
	$$('.fwg-types').each(function(el) {
		if (el.id == 'fwg-type-'+id) el.setStyle('display', '');
		else el.setStyle('display', 'none');
	});
}
</script>