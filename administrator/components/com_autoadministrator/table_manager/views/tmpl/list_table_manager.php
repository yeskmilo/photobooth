<?php
    /**
	* @package		Cuppa CMS
	* @copyright	Copyright (C) 2011 Open Source Matters, T-Golden Group :: tufik2@hotmail.com
	* @Version 		b.0..1 (GPL)
	*/
	// No direct access
        defined('_JEXEC') or die;
        
	JToolBarHelper::title("Auto Manager :: Table Lists");
	JToolBarHelper::editList();
	JToolBarHelper::deleteList("Are you sure you want to delete the selected items.");
?>
<form name="adminForm" id="adminForm" method="post" action="?option=com_autoadministrator&suboption=table_manager">
<?php if($info){ ?>
	<table class="adminlist">
		<thead>
			<tr>
				<th width="1%"><input type="checkbox" onclick="checkAll(<?php echo count($info) ?>)" title="Check All" value="" name="toggle"></th>
				<th width="3%" class="nowrap">Id</th>
				<th class="left">Table</th>
				<th class="left">Params</th>
			</tr>
		</thead>
		<tbody>
        	<?php for($i = 0; $i < count($info); $i++){ ?>
                    <tr class="row">
                        <td class="center" style="text-align:center"><input type="checkbox" title="Checkbox for row 1" onclick="isChecked(this.checked);" value="<?php echo $info[$i]["id"] ?>" name="cid[]" id="cb<?php echo $i ?>"></td>
                        <td class="center" style="text-align:center"><a title="Edit User Super User" href="?option=com_autoadministrator&suboption=table_manager&task=edit&id=<?php echo $info[$i]["id"] ?>"><?php echo $info[$i]["id"] ?></a></td>
                        <td class="left"><?php echo $info[$i]["table_name"] ?></td>
                        <td class="left">JSON params</td>
                    </tr>
			<?php } ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="15">
				</td>
			</tr>
		</tfoot>
	</table>
<?php }else{ ?>
	<table style="width:100%; margin-top:10px; border:1px solid #D2D2D2; border-radius:5px" class="adminlist">
        <tbody>
	        <tr>
            	<td style="text-align:center; font-weight:bold; background:#FFF4CC; color:#E79300; padding:10px 0 10px 0">Table without information</td>
        	</tr>
		</tbody>
    </table>
    <div style="height:10px"></div>
<?php } ?>
    <input type="hidden" name="option" value="com_autoadministrator" />
    <input type="hidden" name="suboption" value="table_manager" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" id="task" name="task" value="" />
    <!-- Select Table -->
    <div>
	    <label for="table_name">Add new table:</label>        
        <select name="table_name" id="table_name">
            <option value="-1">Select table</option>
            <?php 
                for($i = 0; $i < count($infoTables); $i++){
                    echo "<option value='".$infoTables[$i]."'>".$infoTables[$i]."</option>";
                }
            ?>
        </select>
		<input class="button_form" type="button" value="Configure" onclick="SubmitForm('new')" />
    </div>
	<!-- End Select Table -->
</form>
<script>
	function SubmitForm(task){
		if(jQuery("#table_name").val() == "-1"){ alert("Select the table that you want to administer"); return }
		jQuery('#task').attr('value',task); document.forms["adminForm"].submit();
	}
	jQuery("#submenu-box").css("display","none");
</script>