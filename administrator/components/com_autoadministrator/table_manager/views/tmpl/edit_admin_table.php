<?php
    /**
	* @package		Cuppa CMS
	* @copyright	Copyright (C) 2011 Open Source Matters, T-Golden Group :: tufik2@hotmail.com
	* @Version 		b.0..1 (GPL)
	*/
	// No direct access
        defined('_JEXEC') or die;
        
	JToolBarHelper::title("Table :: " .$_REQUEST["view"]);
	JToolBarHelper::save("save", "Guardar");
	JToolBarHelper::cancel("cancel", "Cancelar");
	JRequest::setVar('hidemainmenu', true);
	
	//++ Get type fields
		$files = scandir("components/com_autoadministrator/table_manager/fields/");
		for($i = 0; $i < count($files); $i++){
			if($files[$i] != "." && $files[$i] != ".."){
				$file = explode(".", $files[$i]);
				if(count($file) > 1) require("table_manager/fields/". $file[0].".php");
			}
		}
	//--
?>
<form id="adminForm" name="adminForm" action="" method="post">
    <fieldset class="adminform" style="background:#FFFFFF">
        <legend><?php if($_REQUEST["task"] == "edit"){ ?>Edit record<?php }else{ ?>New record<?php } ?></legend>
        <table width="100%" cellspacing="0" cellpadding="3" border="0">
        <?php for($i = 0; $i < count($infoColumbs); $i++){ ?>
            <tr>
                <td style="width:160px; padding-left:10px; <?php if($field_types->$infoColumbs[$i]->type == "TextArea") echo "vertical-align:top; padding-top:5px" ?>"><?php echo $field_types->$infoColumbs[$i]->label ?></td>
                <td>
                    <?php
                        $className = $field_types->$infoColumbs[$i]->type;
                        $field = new $className();
                        echo $field->GetItem($infoColumbs[$i]."_field", $info[$infoColumbs[$i]], json_encode(@$field_types->$infoColumbs[$i]->config), $field_types->$infoColumbs[$i]->required);
                    ?>
                </td>
            </tr>
         <?php } ?>
        </tbody>
        </table>
    </fieldset>
    <input type="hidden" name="option" value="com_autoadministrator" />
    <input type="hidden" name="suboption" value="table_manager" />
    <input type="hidden" name="view" id="view" value="<?php echo $_REQUEST["view"] ?>" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" id="task" name="task" value="" />
    <input type="hidden" id="limitstart" name="limitstart" value="<?php echo @$_REQUEST["limitstart"] ?>" />
    
    <input type="hidden" name="id" id="id" value="<?php echo @$_REQUEST["id"]; ?>" />
    <input type="hidden" name="page" id="page" value="<?php echo @$_REQUEST["page"] ?>" />
</form>
<script type="text/javascript">
	function submitbutton(task) {
		if (task == 'cancel' || task == 'remove' || jQuery("#adminForm").valid() ) {
			submitform( task );
		}
	}
	jQuery().ready( function(){ jQuery("#adminForm").validate() });
	
	jQuery("#submenu-box").css("display","none");
</script>