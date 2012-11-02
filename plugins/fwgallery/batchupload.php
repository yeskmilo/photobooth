<?php
/**
 * FW Gallery Batch Upload Plugin 1.2.1
 * @copyright (C) 2012 Fastw3b
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.fastw3b.net/ Official website
 **/

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class plgFwGalleryBatchUpload extends JPlugin {
	function fwGetSiteImagesForm() {
		jimport('joomla.application.component.model');
		JModel :: addIncludePath(JPATH_SITE.'/components/com_fwgallery/models/');
		if ($model = JModel :: getInstance('Frontendmanager', 'fwGalleryModel')) {
			$galleries = (array)$model->getCategories();
		} else $galleries = array();

		$max_file_size = min(
			plgFwGalleryBatchUpload :: _fwCalcFileSize(ini_get('upload_max_filesize')),
			plgFwGalleryBatchUpload :: _fwCalcFileSize(ini_get('post_max_size'))
		);

		ob_start();
		include(dirname(__FILE__).'/batchupload/tmpl/siteform.php');
		return ob_get_clean();
	}
	function fwGetAdminForm() {
		$max_file_size = min(
			plgFwGalleryBatchUpload :: _fwCalcFileSize(ini_get('upload_max_filesize')),
			plgFwGalleryBatchUpload :: _fwCalcFileSize(ini_get('post_max_size'))
		);

		ob_start();
		include(dirname(__FILE__).'/batchupload/tmpl/adminform.php');
		return ob_get_clean();
	}
	function _fwHumanFileSize($val) {
		if ($val > 1073741824) return round($val / 1073741824, 2).' '.JText :: _('Gb');
		if ($val > 1048576) return round($val / 1048576, 2).' '.JText :: _('Mb');
		elseif ($val > 1024) return round($val / 1024, 2).' '.JText :: _('Kb');
		elseif (is_numeric($val)) return $val.' '.JText :: _('b');
		else return $val;
	}
	function _fwCalcFileSize($val) {
		if (preg_match('/^(\d+)(\w){0,1}$/', $val, $m)) {
			switch (strtolower($m[2])) {
				case 'm' : $result = $m[1] * 1024 * 1024;
				break;
				case 'k' : $result = $m[1] * 1024;
				break;
				default :  $result = $m[1];
			}
		} else $result = $val;
		return $result;
	}
	function getArtivesList() {
		jimport('joomla.filesystem.folder');
		$result = array();
		if ($files = JFolder :: files(JPATH_SITE.'/tmp/', '\.zip$')) {
			foreach ($files as $file) {
				$row = new stdclass;
				$row->name = $file;
				$result[] = $row;
			}
		}
		return $result;
	}
	function fwProcess() {
		set_time_limit(0);
		$path = JPATH_SITE.'/tmp/';
		switch (JRequest :: getInt('step')) {
/* step1 - file upload */
			case '1' :
				$source_file = '';
				$msg = '';
				if ($gallery_id = JRequest :: getInt('gallery_id')) {
					if (JRequest :: getCmd('file_place') == 'remote') {
						if ($file = JRequest :: getVar('batch_file', '', 'files')
						 and $file_name = JArrayHelper :: getValue($file, 'name')
						  and $tmp_name = JArrayHelper :: getValue($file, 'tmp_name')
						   and !JArrayHelper :: getValue($file, 'error')) {

							if (move_uploaded_file($tmp_name, $path.$file_name)) {
								$source_file = $file_name;
							} else $msg = 'File uploaded but not moved to the tmp folder';
						} else $msg = 'File not uploaded';
					} else {
						$source_file = JRequest :: getString('local_filename');
					}
				} else $msg = 'No gallery selected';
?>
<script type="text/javascript">
<?php
if ($msg) {
?>
parent.$('fwgallery-batchupload-step-1').innerHTML = ' - <?php echo JText :: _($msg, true) ?>';
<?php
} else {
?>
parent.$('fwgallery-batchupload-step-1').innerHTML = ' - <?php echo JText :: _('Ok', true) ?>';
parent.$('fwgallery-batchupload-step-2').innerHTML = ' - <img src="<?php echo JURI :: root(true); ?>/plugins/fwgallery/batchupload/<?php if (JFHelper :: isJoomla16()) { ?>batchupload/<?php } ?>assets/images/pleasewait.gif"/>';
parent.$('fw-batch-upload-form').filename.value = '<?php echo $source_file; ?>';
parent.$('fw-batch-upload-form').step.value = 2;
<?php
	if (JFHelper :: isJoomla16()) {
?>
parent.$('fw-batch-upload-form').set('send', {
	evalScripts: true
}).send();
<?php
	} else {
?>
parent.$('fw-batch-upload-form').send({
	evalScripts: true
});
<?php
	}
}
?>
</script>
<?php
			break;
/* step2 - unpack file */
			case '2' :
				$folder = '';
				$msg = '';
				$images_qty = 0;
				if ($source_file = JRequest :: getString('filename')) {
					if (file_exists(JPATH_SITE.'/tmp/'.$source_file)) {
						ini_set('memory_limit', '256M');
						jimport('joomla.filesystem.file');
						jimport('joomla.filesystem.folder');
						jimport('joomla.filesystem.archive');
						do {
							$folder = md5(microtime().rand());
						} while (file_exists($path.$folder));
						JFolder :: create($path.$folder);

						if (JArchive :: extract($path.$source_file, $path.$folder)) {
							if ($files = JFolder :: files($path.$folder, '.', $recurse = true, $fullpath = true)) foreach ($files as $file) {
								if (preg_match('/\.(gif|png|jpg|jpeg)$/i', basename($file))) {
									$images_qty++;
								}
							}
						} else $msg = 'Archive is not unpacked';

						if (!$images_qty) {
							$msg = 'No images found in the archive';
							JFolder :: delete($path.$folder);
							$folder = '';
						}
						if (JRequest :: getCmd('file_place') == 'remote') JFile :: delete($path.$source_file);
					} else $msg = 'File not found';
				} else $msg = 'Nothing to unpack';
?>
<script type="text/javascript">
<?php
				if ($msg) {
?>
$('fwgallery-batchupload-step-2').innerHTML = ' - <?php echo JText :: _($msg, true) ?>';
<?php
				} else {
?>
$('fwgallery-batchupload-step-2').innerHTML = ' - <?php echo JText :: _('Ok', true) ?>';
$('fwgallery-batchupload-step-3').innerHTML = ' - <?php echo JText :: sprintf('%s image(s)', $images_qty); ?> <img src="<?php echo JURI :: root(true); ?>/plugins/fwgallery/batchupload/<?php if (JFHelper :: isJoomla16()) { ?>batchupload/<?php } ?>assets/images/pleasewait.gif"/>';
$('fw-batch-upload-form').folder.value = '<?php echo $folder; ?>';
$('fw-batch-upload-form').step.value = 3;
<?php
					if (JFHelper :: isJoomla16()) {
?>
$('fw-batch-upload-form').set('send', {
	evalScripts: true
}).send();
<?php
					} else {
?>
$('fw-batch-upload-form').send({
	evalScripts: true
});
<?php
					}
				}
?>
</script>
<?php
			break;
/* step2 - copy images */
			case '3' :
				$msg = '';
				$succ = 0;
				$err = 0;
				$gallery_id = JRequest :: getInt('gallery_id');
				if ($folder = JRequest :: getString('folder')) {
					if (file_exists($path.$folder)) {
						jimport('joomla.filesystem.folder');
						jimport('joomla.filesystem.file');
						if ($files = JFolder :: files($path.$folder, '.', $recurse = true, $fullpath = true)) {
							foreach ($files as $file) if (preg_match('/\.(gif|png|jpg|jpeg)$/i', basename($file))) {
								$image = JTable :: getInstance('File', 'Table');
								$_FILES['filename'] = array(
									'name' => basename($file),
									'tmp_name' => $file,
									'error' => 0,
									'size' => filesize($file),
									'type' => 'image/'.JFile :: getExt(basename($file))
								);
								JRequest :: setVar('id', 0);
								JRequest :: setVar('project_id', $gallery_id);
								JRequest :: setVar('name', ucfirst(strtolower(str_replace('_', ' ', JFile :: stripExt(basename($file))))));
		                        JRequest :: setVar('created', date('Y-m-d H:i:s', filectime($file)));

		                        if ($image->bind(JRequest :: get()) and $image->check() and $image->store()) $succ++;
		                        else $err++;
							}
							JFolder :: delete($path.$folder);
						} else $msg = 'Unpacked archive is empty';
					} else $msg = 'A folder with unpacked images is non-exists';
				} else $msg = 'Nothing to import';
?>
<script type="text/javascript">
<?php
if ($msg) {
?>
$('fwgallery-batchupload-step-3').innerHTML = ' - <?php echo JText :: _($msg, true) ?>';
<?php
} else {
?>
$('fwgallery-batchupload-step-3').innerHTML = ' - <?php echo JText :: sprintf('Succesfully imported: %s, errors: %s', $succ, $err); ?>';
<?php
}
?>
</script>
<?php
			break;
		}
		die();
	}
}
?>