<?php defined('_JEXEC') or die('Restricted access');

jimport( 'joomla.html.pagination' );

$pageNav = new JPagination($this->totales , $_REQUEST["limitstart"], 24); ?>


<?php 
if($this->datos ):
foreach($this->datos as $row):

?>
<div class="caja-imagen caja-lista-<?php echo $cuenta;?>">
	<a class="imagen-box" onclick="info('<?php echo $row->name; ?>','images/com_fwgallery/files/<?php echo $row->user_id; ?>','<?php echo $row->id ?>', '<?php echo $row->filename ?>','<?php echo $this->gallery->user_id; ?>');"><img src="images/com_fwgallery/files/<?php echo $row->user_id; ?>/th_<?php echo $row->filename ?>" /></a>
    <div class="roll">
    	<a onclick="info('<?php echo $row->name; ?>','images/com_fwgallery/files/<?php echo $row->user_id; ?>','<?php echo $row->id ?>', '<?php echo $row->filename ?>','<?php echo $this->gallery->user_id; ?>');" class="roll-share"></a>
        <a onclick="info('<?php echo $row->name; ?>','images/com_fwgallery/files/<?php echo $row->user_id; ?>','<?php echo $row->id ?>', '<?php echo $row->filename ?>','<?php echo $this->gallery->user_id; ?>');" class="roll-zoom"></a>
    </div>
    <div class="marca-small"></div>
</div>
<?php endforeach; 

else:

echo '<span class="no-search">The search did not return any results</span>';

endif;
?>


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

