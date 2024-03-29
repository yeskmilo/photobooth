<?php
/**
 * SEF module for Joomla!
 *
 * @author      $Author: shumisha $
 * @copyright   Yannick Gaultier - 2007-2011
 * @package     sh404SEF-16
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version     $Id: default_topsocialtweeter.php 2156 2011-11-18 17:50:43Z silianacom-svn $
 */

// Security check to ensure this file is being included by a parent file.
if (!defined('_JEXEC')) die('Direct Access to this location is not allowed.');

?>
<div class="width-100">
<fieldset>

  <?php if (!empty($this->analytics->analyticsData->topSocialTweeter)) : ?>
  
   <legend><?php echo JText16::_('COM_SH404SEF_ANALYTICS_SOCIAL_TWEETER_ENGAGEMENT'); ?></legend>
        
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
        
        <?php  $t = JText16::_('COM_SH404SEF_ANALYTICS_TOTAL_TWEETER_ENGAGEMENT') . '::' . JText16::_('COM_SH404SEF_ANALYTICS_TOTAL_TWEETER_ENGAGEMENT_DESC'); ?>
        <th class="title hasAnalyticsTip" title="<?php echo $t;?>" >
        <?php echo JText16::_( 'COM_SH404SEF_ANALYTICS_TOTAL_TWEETER_ENGAGEMENT' ); ?>
        </th>
        
        <?php?>
        <th class="title" >
        <?php echo '%'; ?>
        </th>
        
        <?php  $t = JText16::_('COM_SH404SEF_ANALYTICS_TOP5_AVG_TIME_ON_PAGE') . '::' . JText16::_('COM_SH404SEF_ANALYTICS_TT_AVG_TIME_ON_PAGE_DESC'); ?>
        <th class="title hasAnalyticsTip" title="<?php echo $t;?>" >
        <?php echo JText16::_( 'COM_SH404SEF_ANALYTICS_TOP5_AVG_TIME_ON_PAGE' ); ?>
        </th>
      </tr>
    </thead>
 	      
 	      
 	 <tbody>
        <?php
          $k = 0;
          $i = 1;
          foreach($this->analytics->analyticsData->topSocialTweeter as $entry) :
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
          
          <td align="center" width="15%">
            <?php echo $this->escape( $entry->totalEvents); ?>
          </td>
          
          <td align="center" width="10%">
            <?php 
              echo $this->escape( sprintf( '%0.1f', $entry->eventsPerCent*100));
            ?>
          </td>
          
          <td align="center" width="10%">
            <?php 
              echo $this->escape( sprintf( '%0.1f', $entry->avgTimeOnPage));
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
 	  <legend><?php echo JText16::_('COM_SH404SEF_ANALYTICS_SOCIAL_NO_TWEETER_ENGAGEMENT'); ?></legend>
 	<?php endif; ?>      
</fieldset>
</div>	

	