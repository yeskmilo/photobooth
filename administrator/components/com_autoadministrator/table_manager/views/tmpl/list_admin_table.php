<?php
    /**
	* @package		Cuppa CMS
	* @copyright	Copyright (C) 2011 Open Source Matters, T-Golden Group :: tufik2@hotmail.com
	* @Version 		b.0..1 (GPL)
	*/
	// No direct access
        defined('_JEXEC') or die;
        
	JToolBarHelper::title("Table :: " .$_REQUEST["view"]);
	JToolBarHelper::addNew("new");
	JToolBarHelper::editList();
	JToolBarHelper::deleteList("Are you sure you want to delete the selected items.");
	
	// Paginator
		$configuration = new JConfig();
		$list_limit = $configuration->list_limit;
		jimport( 'joomla.html.pagination' );
		$pageNav = new JPagination( $totalRows, $_REQUEST["limitstart"], $list_limit);
?>
<form name="adminForm" id="adminForm" method="post" action="?option=com_autoadministrator&suboption=table_manager">
    <table class="adminlist">
        <thead>
            <tr>
                <th width="1%"><input type="checkbox" onclick="checkAll(<?php echo count($info) ?>)" title="Check All" value="" name="toggle"></th>
                <?php for($i = 0; $i < count($infoColumns); $i++){ ?>
                    <?php if(strtolower($infoColumns[$i]) == "id"){ ?>
                        <?php if(@$field_types->$infoColumns[$i]->showList){ ?>
                            <th width="3%"><a href="#"><?php echo $field_types->$infoColumns[$i]->label ?></th>
                        <?php } ?>
                    <?php }else{ ?>
                        <?php if(@$field_types->$infoColumns[$i]->showList){ ?>
                            <th class="header"><a href="#"><?php echo $field_types->$infoColumns[$i]->label ?></th>
                        <?php } ?>
                    <?php }?>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
                <?php 
                    if($info){
                        for($i = 0; $i < count($info); $i++){ 
                ?>
                        <tr class="row">

                            <td class="select"><input id="cb<?php echo $i ?>" name="cid[]" onclick="isChecked(this.checked);" type="checkbox" value="<?php echo $info[$i][$field_types->primary_key] ?>" /></td>
                            <?php for($j = 0; $j < count($infoColumns); $j++){ ?>
                                <?php if(strtolower($infoColumns[$j]) == $field_types->primary_key){ ?>
                                    <?php if(@$field_types->$infoColumns[$j]->showList){ ?>
										<td><a href="?option=com_autoadministrator&suboption=table_manager&task=edit&view=<?php echo $_REQUEST["view"] ?>&id=<?php echo $info[$i][$j] ?>&limitstart=<?php echo @$_REQUEST["limitstart"] ?>"><?php echo $info[$i][$j] ?></a></td>
                                    <?php } ?>
                                <?php }else{ ?>
                                    <?php if(@$field_types->$infoColumns[$j]->showList){ ?>
                                        <td><?php echo $info[$i][$j] ?></td>
                                    <?php } ?>
                                <?php }?>
                            <?php } ?>
                        </tr>
                <?php 
                        }
                    }
                ?>
            </tbody>
    </table>
    <?php if(!$info){ ?>
        <table style="width:100%; margin-top:10px; border:1px solid #D2D2D2; border-radius:5px" class="adminlist">
            <tbody>
                <tr>
                    <td style="text-align:center; font-weight:bold; background:#FFF4CC; color:#E79300; padding:10px 0 10px 0">Table without information</td>
                </tr>
            </tbody>
        </table>
    <?php } ?>
    <input type="hidden" name="option" value="com_autoadministrator" />
    <input type="hidden" name="suboption" value="table_manager" />
    <input type="hidden" name="view" id="view" value="<?php echo $_REQUEST["view"] ?>" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" id="task" name="task" value="" />
    <input type="hidden" id="limitstart" name="limitstart" value="<?php echo @$_REQUEST["limitstart"] ?>" />
</form>
<div style="height:10px"></div>
<div id="paginator" class="paginator" style="position:relative; width:100%;">
    <table id="paginator_table" class="paginator_table" style="position:relative; margin:0 auto;">
        <tr>
            <td colspan="9"><?php echo $pageNav->getPagesLinks(); ?></td>
        </tr>
    </table>
</div>
<script>
	jQuery("#submenu-box").css("display","none");
</script>