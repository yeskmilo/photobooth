<?php
    /**
	* @package		Cuppa CMS
	* @copyright	Copyright (C) 2011 Open Source Matters, T-Golden Group :: tufik2@hotmail.com
	* @Version 		b.0..1 (GPL)
	*/
	// No direct access
        defined('_JEXEC') or die;
        
	$title = "New Item"; if($_REQUEST["id"]) $title = "Edit Item";
	JToolBarHelper::title("Menu Manager");
	JToolBarHelper::save("save", "Guardar");
	JToolBarHelper::cancel("cancel", "Cancelar");
	JRequest::setVar('hidemainmenu', true);
		
	// Get table selected
		$table_selected = explode("view=", @$info["admin_menu_link"]);
		$table_selected = @$table_selected[1];
?>
<div class="frame">
    <form id="adminForm" name="adminForm" action="?option=com_autoadministrator&suboption=menu_manager" method="post">
        <fieldset style="background:#FFFFFF" class="adminform">
            <legend><?php echo $title ?></legend>
            <table width="100%" cellspacing="0" cellpadding="3" border="0">
                <tbody>
                    <tr>
                        <td style="width:160px; padding-left:10px;">Id</td>
                        <td>
                            <input type="text" class="text_field readonly" readonly="readonly" value="<?php echo @$_REQUEST["id"] ?>" name="id" id="id">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:160px; padding-left:10px;">Title</td>
                        <td>
                            <input style="width:160px" type="text" class="text_field required" value="<?php echo @$info["name"] ?>" name="title" id="title">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:160px; padding-left:10px;">Parent</td>
                        <td>
                        	<select style="width:160px" id="parent_id" name="parent_id" >
                            	<option value="0">Select</option>
                                <?php
									if($parent_list){
										for($i = 0; $i < count($parent_list); $i++){
											if($parent_list[$i]["id_relationship"] != @$_REQUEST["id"])
												echo '<option value="'.$parent_list[$i]["id_relationship"].'">'.$parent_list[$i]["name"].'</option>';
										}
									}
								?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:160px; padding-left:10px;">Table</td>
                        <td>
                        	<select style="width:160px" id="table_name" name="table_name" class="required" >
                                <?php
                                	for($i = 0; $i < count($tables); $i++){
										echo '<option value="'.$tables[$i]["table_name"].'">'.$tables[$i]["table_name"].'</option>';
									}
								?>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
        <input type="hidden" name="option" id="option" value="com_autoadministrator" />
        <input type="hidden" name="suboption" value="menu_manager" />
        <input type="hidden" name="id" id="id" value="<?php echo @$_REQUEST["id"] ?>" />
        <input type="hidden" name="task" id="task" value="" />
        <input type="hidden" name="boxchecked" value="0" />
    </form>
</div>
<script>
	function submitbutton(task) {
		if (task == 'cancel' || task == 'remove' || jQuery("#adminForm").valid() ) {
			submitform( task );
		}
	}
	jQuery().ready( function(){ jQuery("#adminForm").validate() });
	
	jQuery("#submenu-box").css("display","none");
	// Select
		jQuery("#parent_id option[value=<?php echo @$info["parent"] ?>]").attr("selected",true);
		jQuery("#table_name option[value=<?php echo @$table_selected ?>]").attr("selected",true);
</script>