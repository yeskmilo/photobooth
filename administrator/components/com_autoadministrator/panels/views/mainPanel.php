<?php
    /**
	* @package		Cuppa CMS
	* @copyright	Copyright (C) 2011 Open Source Matters, T-Golden Group :: tufik2@hotmail.com
	* @Version 		b.0..1 (GPL)
	*/
	// No direct access
        defined('_JEXEC') or die;
        
	JToolBarHelper::title("Auto Manager :: Principal Panel");
?>
<div class="cpanel-left">
    <div id="cpanel">
    	<div class="icon-wrapper">
        	<div class="icon">
	        	<a href="?option=com_autoadministrator&suboption=table_manager">
                    <img alt="menu_manager" src="components/com_autoadministrator/panels/images/table_manager.png">
                    <span>Table Manager</span>
                </a>
	        </div>
        </div>
        <div class="icon-wrapper">
        	<div class="icon">
	        	<a href="?option=com_autoadministrator&suboption=menu_manager">
                    <img alt="menu_manager" src="components/com_autoadministrator/panels/images/menu_manager.png">
                    <span>Menu Manager</span>
                </a>
	        </div>
        </div>
    </div>
</div>
<script>
	jQuery("#submenu-box").css("display","none");
</script>