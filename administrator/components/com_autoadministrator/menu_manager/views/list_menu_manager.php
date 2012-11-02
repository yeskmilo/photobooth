<?php
    /**
	* @package		Cuppa CMS
	* @copyright	Copyright (C) 2011 Open Source Matters, T-Golden Group :: tufik2@hotmail.com
	* @Version 		b.0..1 (GPL)
	*/
	// No direct access
        defined('_JEXEC') or die;
        
	JToolBarHelper::title("Menu Manager :: Menu Items List");
	JToolBarHelper::addNew("new");
	JToolBarHelper::editList();
	JToolBarHelper::deleteList("Are you sure you want to delete the selected items.");
?>
<form name="adminForm" id="adminForm" method="post" action="?option=com_autoadministrator&suboption=menu_manager">
<?php if($info){ ?>
	<table class="adminlist">
		<thead>
			<tr>
				<th width="1%"><input type="checkbox" onclick="checkAll(<?php echo count($info) ?>)" title="Check All" value="" name="toggle"></th>
				<th width="3%" class="nowrap">Id</th>
				<th class="10%">Id Relationship</th>
                <th width="76%" class="left">Title</th>
                <th class="10%" class="center">Parent</th>
			</tr>
		</thead>
		<tbody>
        	<?php for($i = 0; $i < count($info); $i++){ ?>
                    <tr class="row">
                        <td class="center"><input type="checkbox" title="Checkbox for row 1" onclick="isChecked(this.checked);" value="<?php echo $info[$i]["id_relationship"] ?>" name="cid[]" id="cb<?php echo $i ?>"></td>
                        <td class="center"><?php echo $info[$i]["id"] ?></td>
                        <td class="center"><a href="?option=com_autoadministrator&suboption=menu_manager&task=edit&id=<?php echo $info[$i]["id_relationship"] ?>"><?php echo $info[$i]["id_relationship"] ?></a></td>
                        <td class="left"><?php echo $info[$i]["name"] ?></td>
                        <td class="center"><?php if($info[$i]["parent_title"] != "Menu_Item_Root") echo $info[$i]["parent_title"]; else echo "-" ?></td>
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
    <input type="hidden" name="suboption" value="menu_manager" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" id="task" name="task" value="" />
</form>
<script>
	jQuery("#submenu-box").css("display","none");
</script>