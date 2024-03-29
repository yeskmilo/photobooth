<?php
/**
 * SEF module for Joomla!
 *
 * @author      $Author: shumisha $
 * @copyright   Yannick Gaultier - 2007-2011
 * @package     sh404SEF-16
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version     $Id: default_topsocialplusone.php 2156 2011-11-18 17:50:43Z silianacom-svn $
 */

// Security check to ensure this file is being included by a parent file.
if (!defined('_JEXEC')) die('Direct Access to this location is not allowed.');

?>
<div class="width-100">
<fieldset>

  <?php if (!empty($this->analytics->analyticsData->topSocialPlusOne)) : ?>
  
   <legend><?php echo JText16::_('COM_SH404SEF_ANALYTICS_SOCIAL_PLUSONE_ENGAGEMENT'); ?></legend>
        
 	<table class="adminlist" >
    <thead>
      <tr>
        <th class="title" >
          <?php echo '#'; ?>
        </th>
        
        <?php  $t = JText16::_('COM_SH404SEF_ANALYTICS_TOP5_URL') . '::' . JText16::_('COM_SH404SEF_ANALYTICS_TT_URL_DESC'); ?>
        <th class="title hasAnalyticsTip" title="<?php echo $t;?>" >
        <?php echo JText16::_( 'COM_SH404SEF_ANALYTICS_TOP5_URL' ); ?>
        </th>
        
        <th class="title hasAnalyticsTip" >
        <?php echo JText16::_( 'COM_SH404SEF_ANALYTICS_SOCIAL_TYPE' ); ?>
        </th>
        
        <?php  $t = JText16::_('COM_SH404SEF_ANALYTICS_TOTAL_PLUSONE_ENGAGEMENT') . '::' . JText16::_('COM_SH404SEF_ANALYTICS_TOTAL_PLUSONE_ENGAGEMENT_DESC'); ?>
        <th class="title hasAnalyticsTip" title="<?php echo $t;?>" >
        <?php echo JText16::_( 'COM_SH404SEF_ANALYTICS_TOTAL_PLUSONE_ENGAGEMENT' ); ?>
        </th>
        
        <?php?>
        <th class="title" >
        <?php echo '%'; ?>
        </th>
        
      </tr>
    </thead>
 	      
 	      
 	 <tbody>
        <?php
          $k = 0;
          $i = 1;
          foreach($this->analytics->analyticsData->topSocialPlusOne as $entry) :
        ?>    
            
        <tr class="<?php echo "row$k"; ?>">
        
          <td align="center" width="3%">
            <?php echo $i; ?>
          </td>
          
          <td width="62%">
            <?php 
            $path = str_replace( JURI::root(),'',  $entry->dimension['eventLabel']);
              echo $this->escape( $path);
            ?>
          </td>
          
          <td align="center" width="10%">
            <?php 
            switch ($entry->dimension['eventAction']) {
              case 'on':
                $action = 'COM_SH404SEF_ANALYTICS_SOCIAL_PLUS_ONE_ON';
                break;
              case 'off':
                $action = 'COM_SH404SEF_ANALYTICS_SOCIAL_PLUS_ONE_OFF';
                break;
              default:
                $action = '-';
                break;
            }
              echo $this->escape( JText16::_($action));
            ?>
          </td>
            
          <td align="center" width="15%">
            <?php echo $this->escape( $entry->totalEvents); ?>
          </td>
          
          <td align="center" width="10%">
            <?php 
              echo $this->escape( sprintf( '%0.1f', $entry->eventsPerCent*100));
            ?>
          </td>
          
        </tr>
        <?php
        $k = 1 - $k;
        $i++;
      endforeach;
 	      
 	    ?>     
 	      
 	  </tbody>
  </table>    
 	      
 	<?php else : ?>
 	  <legend><?php echo JText16::_('COM_SH404SEF_ANALYTICS_SOCIAL_NO_PLUS_ONE_ENGAGEMENT'); ?></legend>
 	<?php endif; ?>
 	
</fieldset>
</div>	

	