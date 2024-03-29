<?php
/**
 * @version   $Id: sh404sefanalytics.php 2325 2012-03-09 18:00:48Z silianacom-svn $
 * @package   sh404SEF
 * @copyright Copyright (C) 2010 Yannick Gaultier. All rights reserved.
 * @license   GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

$mainframe = JFactory::getApplication();
$mainframe->registerEvent( 'onShInsertAnalyticsSnippet', 'plgSh404sefAnalyticsCustomVars' );

function plgSh404sefAnalyticsCustomVars( &$customVars, $sefConfig ) {

  // add custom variable : page creation time
  if ($sefConfig->analyticsEnableTimeCollection) {
    $profiler =& JProfiler::getInstance( 'sh404sef_profiler' );
    $profiler->mark( '');
    $pageCreationTime = $profiler->getBuffer();

    //extract Data
    $pageCreationTime = str_replace( array('<code>sh404sef_profiler', '</code>'), '', $pageCreationTime[0]);
    $tmp = explode( ' ', trim($pageCreationTime)); // we may have memory report attached
    $time = trim($tmp[0]);
    
    // classify exact time into predefined categories for encoding
    $time = Sh404sefHelperAnalytics::classifyTime( $time);

    // same for memory used
    $memory = empty( $tmp[1]) ? 0 : sh404sefHelperAnalytics::classifyMemory( $profiler->getMemory() / (1024*1024));

    // store results into incoming array
    $customVars[SH404SEF_ANALYTICS_TIME_CUSTOM_VAR]->name =  'Page creation time and ram';
    $customVars[SH404SEF_ANALYTICS_TIME_CUSTOM_VAR]->value = ($time << 4) + $memory;

  }

  // add custom variable : user logged in
  if ($sefConfig->analyticsEnableUserCollection) {
    $user = JFactory::getUser();
    $customVars[SH404SEF_ANALYTICS_USER_CUSTOM_VAR]->name =  'Logged-in user';
    $userType = empty( $user->usertype) ? 'anonymous' : $user->usertype;
    $customVars[SH404SEF_ANALYTICS_USER_CUSTOM_VAR]->value = htmlentities( $userType, ENT_QUOTES, 'UTF-8');
  }

  return true;

}

