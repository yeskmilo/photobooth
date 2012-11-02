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
<form action="index.php?option=com_fwgallery&amp;view=plugins" method="post" name="adminForm" id="fw-batch-upload-form" target="batch_uploading_target" enctype="multipart/form-data">
	<table class="admintable">
		<tr>
			<td class="key"><?php echo JText :: _('Select a gallery/sub-gallery'); ?></td>
			<td><?php echo JHTML :: _('fwGalleryCategory.getCategories', 'gallery_id', 0, '', false); ?></td>
		</tr>
		<tr title="<?php echo JFHelper :: escape(JText :: _('Select zip file located in your computer you want to upload and process')); ?>">
			<td class="key">
				<input type="radio" name="file_place" value="remote" id="file_place_remote" checked />
				<label for="file_place_remote"><?php echo JText :: _('Local: select zip file'); ?></label>
			</td>
			<td>
				<?php echo JText :: sprintf('Maximum file size is %s', plgFwGalleryBatchUpload :: _fwHumanFileSize($max_file_size)); ?><br/>
				<input type="file" name="batch_file"/>
			</td>
		</tr>
		<tr title="<?php echo JFHelper :: escape(JText :: _('Select previously uploaded zip file to a Joomla temp folder on your server you want to process')); ?>">
			<td class="key">
				<input type="radio" name="file_place" value="local" id="file_place_local" />
				<label for="file_place_local"><?php echo JText :: _('Remote: select zip file'); ?></label>
			</td>
			<td>
				<?php echo JHTML :: _('select.genericlist', plgFwGalleryBatchUpload :: getArtivesList(), 'local_filename', 'disabled', 'name', 'name'); ?>
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
	<input type="hidden" name="step" value="1" />
	<input type="hidden" name="tmpl" value="component" />
	<input type="hidden" name="task" value="edit" />
	<input type="hidden" name="filename" value="" />
	<input type="hidden" name="folder" value="" />
</form>
<iframe name="batch_uploading_target" style="display:none;"></iframe>
<script type="text/javascript">
window.addEvent('domready', function() {
	$('file_place_remote').addEvent('click', fwcheck_batchupload_form);
	$('file_place_remote').addEvent('change', fwcheck_batchupload_form);
	$('file_place_local').addEvent('click', fwcheck_batchupload_form);
	$('file_place_local').addEvent('change', fwcheck_batchupload_form);

	var form = $('fw-batch-upload-form');
	$(form.upload_button).addEvent('click', function() {
		if (form.gallery_id.value == '') {
			alert('<?php echo JText :: _('Select gallery to import into', true); ?>');
			return;
		} else if ($('file_place_remote').checked) {
			if (form.batch_file.value == '') {
				alert('<?php echo JText :: _('Nothing to upload', true); ?>');
				return;
			} else if (!form.batch_file.value.match(/\.zip$/i)) {
				alert('<?php echo JText :: _('Zip files allowed only', true); ?>');
				return;
			}
		} else if (form.local_filename.value == '') {
			alert('<?php echo JText :: _('Nothing to process', true); ?>');
			return;
		}

		var msg = '<?php echo JText :: _('Are you sure you want to import', true); ?> ';
		if ($('file_place_remote').checked) msg += '<?php echo JText :: _('local') ?>';
		else msg += '<?php echo JText :: _('remote', true); ?>';
		msg += ' <?php echo JText :: _('zip file to', true); ?> '+form.gallery_id.options[form.gallery_id.selectedIndex].text;
		msg += ' <?php echo JText :: _('gallery', true); ?>?';

		if (confirm(msg)) {
			$('fwgallery-batchupload-step-1').innerHTML = ' - <img src="<?php echo JURI :: root(true); ?>/plugins/fwgallery/batchupload/<?php if (JFHelper :: isJoomla16()) { ?>batchupload/<?php } ?>assets/images/pleasewait.gif" alt="<?php echo JText :: _('Please wait', true); ?>" />';
			form.step.value = 1;
			form.submit();
		}
	});
});
function fwcheck_batchupload_form() {
	var form = $('fw-batch-upload-form');
	if ($('file_place_remote').checked) {
		$(form.local_filename).setAttribute('disabled', true);
		$(form.batch_file).removeAttribute('disabled');
	} else {
		$(form.local_filename).removeAttribute('disabled');
		$(form.batch_file).setAttribute('disabled', true);
	}
}
</script>