<?php defined('_JEXEC') or die('Restricted access');

jimport( 'joomla.html.pagination' );

$pageNav = new JPagination($this->totales , $_REQUEST["limitstart"], 23); ?>


<?php include("includes/imageworkshop.php"); 

function photobooth_add_watermark($filepath, $outputpath, $watermark_path = 'images/watermark.png'){
  $layer = new ImageWorkshop(array(
    "imageFromPath" => $filepath,
  ));
  $watermarkLayer = new ImageWorkshop(array(
    "imageFromPath" => "images/watermark.png",
  ));
  $layer->addLayer(1, $watermarkLayer, 12, 12, "LB");
  $image = $layer->getResult();
  $dirPath = $outputpath;
  $filename = _photobooth_detect_filename($filepath);
  $createFolders = true;
  $backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
  $imageQuality = 95; // useless for GIF, usefull for PNG and JPEG (0 to 100%)
  $layer->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);
}

function _photobooth_detect_filename ($filepath) {
  $filepath_array = explode('/', $filepath);
  $last_key = key( array_slice( $filepath_array, -1, 1, TRUE ) );
  return $filepath_array[$last_key];
}

?>


<div class="caja-imagen titulo-imagen">
	<table border="0" cellspacing="0" cellpadding="0" height="94" width="100%">
      <tr>
        <td valign="middle" align="center">
        	<?php echo $this->gallery->name; ?>
        </td>
      </tr>
    </table>

	
</div>
<?php 
$cuenta = 0;
foreach($this->datos as $row):?>

<?php

$filepath = 'images/com_fwgallery/files/'.$this->gallery->user_id.'/'.$row->filename;
$outputpath =  'images/com_fwgallery/files/'.$this->gallery->user_id.'/marca';

photobooth_add_watermark($filepath,$outputpath);

$cuenta++;

?>

<div class="caja-imagen caja-lista-<?php echo $cuenta;?>">
	<a class="imagen-box" onclick="info('<?php echo $row->name ?>','images/com_fwgallery/files/<?php echo $this->gallery->user_id; ?>','<?php echo $row->id ?>', '<?php echo $row->filename ?>','<?php echo $this->gallery->user_id; ?>','<?php echo $cuenta;?>');">
    	<img src="images/com_fwgallery/files/<?php echo $this->gallery->user_id; ?>/th_<?php echo $row->filename ?>" />
    </a>
    <div class="roll">
    	<a onclick="info('<?php echo $row->name ?>','images/com_fwgallery/files/<?php echo $this->gallery->user_id; ?>','<?php echo $row->id ?>', '<?php echo $row->filename ?>','<?php echo $this->gallery->user_id; ?>','<?php echo $cuenta;?>');" class="roll-share"></a>
        <a onclick="info('<?php echo $row->name ?>','images/com_fwgallery/files/<?php echo $this->gallery->user_id; ?>','<?php echo $row->id ?>', '<?php echo $row->filename ?>','<?php echo $this->gallery->user_id; ?>','<?php echo $cuenta;?>');" class="roll-zoom"></a>
    </div>
    <div class="marca-small"></div>
</div>
<?php endforeach; ?>


<div class="clr"></div>

<div class="paginador">
<table border="0" cellspacing="0" cellpadding="0" align="center" width="auto" style="margin:auto">
  <tr>
    <td>
    	<?php echo $pageNav->getPagesLinks(); ?>
    </td>
  </tr>
</table>
<div class="clr"></div>

</div>

