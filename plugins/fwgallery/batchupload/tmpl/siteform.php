<?php
/**
 * FW Gallery Batch Upload Plugin 1.2.1
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined( '_JEXEC' ) or die( 'Restricted access' );

JHTML :: _('behavior.modal');
?>
<legend><?php echo JText :: _('Gallery images batch uploading'); ?></legend>
<form action="<?php echo JRoute :: _('index.php?option=com_fwgallery&view=frontendmanager'); ?>" method="post" id="fw-batch-upload-form" target="batch_uploading_target" enctype="multipart/form-data">
	<table class="admintable">
		<tr>
			<td>
				<?php echo JText :: _('Select a gallery/sub-gallery'); ?>
			</td>
			<td style="padding-left:15px;">
				<?php echo JText :: sprintf('Maximum file size is %s', plgFwGalleryBatchUpload :: _fwHumanFileSize($max_file_size)); ?>
			</td>
		</tr>
		<tr>	
			<td>
				<?php echo JHTML :: _('select.genericlist', $galleries, 'gallery_id', 'class="required"', 'id', 'treename'); ?>
			</td>
			
			<td style="padding-left:15px;" title="<?php echo JFHelper :: escape(JText :: _('Select zip file located in your computer you want to upload and process')); ?>">
				
				<input type="file" name="batch_file"/>
			</td>
			
		</tr>
	</table>
	<ul>
		<li><?php echo JText :: _('Archive uploading'); ?><span id="fwgallery-batchupload-step-1"></span></li>
		<li><?php echo JText :: _('Archive unpacking'); ?><span id="fwgallery-batchupload-step-2"></span></li>
		<li><?php echo JText :: _('Images copying and resizing'); ?><span id="fwgallery-batchupload-step-3"></span></li>
	</ul>
	<input type="button" name="upload_button" value="<?php echo JText :: _('Upload'); ?>" />
	<input type="hidden" name="plugin" value="batchupload" />
	<input type="hidden" name="task" value="processPlugin" />
	<input type="hidden" name="step" value="1" />
	<input type="hidden" name="tmpl" value="component" />
	<input type="hidden" name="file_place" value="remote" />
	<input type="hidden" name="filename" value="" />
	<input type="hidden" name="folder" value="" />
</form>
<iframe name="batch_uploading_target" style="display:none;"></iframe>
<script type="text/javascript">
window.addEvent('domready', function() {
	var form = $('fw-batch-upload-form');
	$(form.upload_button).addEvent('click', function() {
		if (form.gallery_id.value == '') {
			alert('<?php echo JText :: _('Select gallery to import into', true); ?>');
			return;
		} else {
			if (form.batch_file.value == '') {
				alert('<?php echo JText :: _('Nothing to upload', true); ?>');
				return;
			} else if (!form.batch_file.value.match(/\.zip$/i)) {
				alert('<?php echo JText :: _('Zip files allowed only', true); ?>');
				return;
			}
		}

		var msg = '<?php echo JText :: _('Are you sure you want to import', true); ?> ';
		msg += ' <?php echo JText :: _('zip file to', true); ?> '+form.gallery_id.options[form.gallery_id.selectedIndex].text;
		msg += ' <?php echo JText :: _('gallery', true); ?>?';

		if (confirm(msg)) {
			$('fwgallery-batchupload-step-1').innerHTML = ' - <img src="<?php echo JURI :: root(true); ?>/plugins/fwgallery/batchupload/<?php if (JFHelper :: isJoomla16()) { ?>batchupload/<?php } ?>assets/images/pleasewait.gif" alt="<?php echo JText :: _('Please wait', true); ?>" />';
			form.step.value = 1;
			form.submit();
		}
	});
});
</script>