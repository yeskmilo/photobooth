<?php
    /**
	* @package		Cuppa CMS
	* @copyright	Copyright (C) 2011 Open Source Matters, T-Golden Group :: tufik2@hotmail.com
	* @Version 		b.0..1 (GPL)
	*/ 
?>
<script type="text/javascript">
	function GetInfo(){
		var jsonScript = "";
		var folder = jQuery('#folder').val();
		if(!folder){ alert("Please, write a folder path");  return;	}
		jsonScript += '{"folder":"' + folder + '"}';
		var field_name = "#" + "<?php echo $_REQUEST["field"] ?>" + "_config";
		jQuery(field_name).attr("value", jsonScript);
		CloseDefaultAlert();
	}
	function LoadDefaultInfo(){
		var defaultFolder = '../images';
		var field_name = "#" + "<?php echo $_REQUEST["field"] ?>" + "_config";
		var defaultInfo = jQuery.parseJSON( jQuery(field_name).attr("value") );
		if(!defaultInfo){ jQuery("#folder").attr("value", defaultFolder); return};
		jQuery("#folder").attr("value", defaultInfo.folder);
	}
	LoadDefaultInfo();
</script>
<style>
	.text td{
		padding:3px;
		vertical-align:central;
		text-align:left;
	}
</style>
<p style="text-align:justify; margin-bottom:10px; border:1px dashed #CCC; color:#C30; background:#EEE; padding:5px 10px 5px 10px;">Configuration parameters for field: <?php echo str_replace("_field","",$_REQUEST["field"]) ?></p>
<div class="text">
    <form id="text_form" name="text_form">
        <table style="width:100%">
            <tr>
                <td><label for="folder">Folder Path: </label></td>
                <td><input id="folder" name="folder" class="required" /></td>
            </tr>
        </table>
        <div class="separator" id="separator_config" style="margin-bottom:15px; margin-top:15px;"></div>
        <input class='button_form' type='button' value='Accept' onclick="GetInfo()"/>
    </form>
</div>