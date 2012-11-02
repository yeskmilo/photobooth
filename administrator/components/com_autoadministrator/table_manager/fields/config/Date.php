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
		var radioSelected = jQuery('input[name=typeSelect]:checked', '#text_form').val();
		if(radioSelected == "normal"){
			jsonScript += '{"type":"normal"}';
		}else if(radioSelected == "datePicker"){
			var config = jQuery('#config').val();
			jsonScript += '{"type":"datePicker", "config":"'+config+'"}';
		}
		var field_name = "#" + "<?php echo $_REQUEST["field"] ?>" + "_config";
		jQuery(field_name).attr("value", jsonScript);
		CloseDefaultAlert();
	}
	function LoadDefaultInfo(){
		jQuery("#datePicker").attr("checked", "checked");
		var field_name = "#" + "<?php echo $_REQUEST["field"] ?>" + "_config";
		var defaultInfo = jQuery.parseJSON( jQuery(field_name).attr("value") );
		if(!defaultInfo) return;
		if(defaultInfo.type == "datePicker"){
			jQuery("#datePicker").attr("checked", "checked");
			jQuery("#config option[value="+defaultInfo.config+"]").attr("selected",true);
		}
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
                <td><input type="radio" name="typeSelect" id="datePicker" value="datePicker" /></td>
                <td><label for="datePicker">Date picker :: Type: </label></td>
                <td>
                    <select id="config" name="config">
                        <option value="simple">simple</option>
                        <option value="auto_today_selected">auto today selected</option>
                    </select>
                </td>
            </tr>
        </table>
        <div class="separator" id="separator_config" style="margin-bottom:15px; margin-top:15px;"></div>
        <input class='button_form' type='button' value='Accept' onclick="GetInfo()"/>
    </form>
</div>