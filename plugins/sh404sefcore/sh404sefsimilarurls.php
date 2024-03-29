<?php
/**
 * @version   $Id: sh404sefsimilarurls.php 2166 2011-11-19 17:04:41Z silianacom-svn $
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

jimport( 'joomla.utilities.string');

$app = &JFactory::getApplication();
if (!$app->isAdmin()) {
  $app->registerEvent( 'onPrepareContent', 'plgSh404sefsimilarurls' );
}

function plgSh404sefsimilarurls( &$rowContent, &$params, $page=0 ) {

  $app = &JFactory::getApplication();

  // are we in the backend, or not offline ?
  if ($app->isAdmin() || !defined( 'SH404SEF_IS_RUNNING')) {
    return true;
  }

  // a little hack on the side : optionnally display the requested url

  // first get current sef url
  $shPageInfo = & shRouter::shPageInfo();

  // replace marker
  $rowContent->text = str_replace( '{%sh404SEF_404_URL%}', htmlspecialchars($shPageInfo->URI->getUrl(), ENT_COMPAT, 'UTF-8'), $rowContent->text);

  // now similar urls
  $marker = 'sh404sefSimilarUrls';

  // quick check for our marker:
  if (JString::strpos( $rowContent->text, $marker) === false) {
    return true;
  }

  // get plugin params
  $plugin =& JPluginHelper::getPlugin('sh404sefcore', 'sh404sefsimilarurls');

  // init params from plugin
  $pluginParams = new JParameter($plugin->params);

  $matches = array();

  // regexp to catch plugin requests
  $regExp = "#{" . $marker . "}#Us";

  // search for our marker}
  if (preg_match_all( $regExp, $rowContent->text, $matches, PREG_SET_ORDER) > 0) {
    // we have at least one match, we can search for similar urls
    $html = shGetSimilarUrls( $pluginParams);

    // remove comment, so that nothing shows
    if (empty( $html)) {
      $rowContent->text = preg_replace( '/{sh404sefSimilarUrlsCommentStart}.*{sh404sefSimilarUrlsCommentEnd}/iUs', '', $rowContent->text);
    } else {
      // remove the comment markers themselves
      $rowContent->text = str_replace( '{sh404sefSimilarUrlsCommentStart}', '', $rowContent->text);
      $rowContent->text = str_replace( '{sh404sefSimilarUrlsCommentEnd}', '', $rowContent->text);
    }

    // now replace instances of the marker by similar urls list
    $rowContent->text = str_replace( $matches[0], $html , $rowContent->text );
  }

  return true;

}

/**
 * @params object parameters set by user for the plugin
 * @return string a list of sef urls similar to that of the current page
 */
function shGetSimilarUrls( $params) {

  // init result
  $urls = '';

  // first get current sef url
  $shPageInfo = & shRouter::shPageInfo();

  // current path
  $path = JString::trim($shPageInfo->shCurrentPagePath);
  $path = JString::trim($path, '.');

  // if empty, we may be on a non-sef urls
  if (empty( $path)) {
    return $urls;
  }

  $urlList = shFindSimilarUrls($path, $params);

  $urls = shFormatSimilarUrls( $urlList);

  return $urls;
}
/**
 * @params object parameters set by user for the plugin
 * @return string a list of sef urls similar to that of the current page
 */
function shFindSimilarUrls( $path, $params) {

  // init result
  $urls = array();

  // if empty, we may be on a non-sef urls
  if (empty( $path)) {
    return $urls;
  }

  // actually do the search

  // minimum segment to use
  $minLength = $params->get( 'min_segment_length', 3);

  // break down path into segments, and check them
  $bits = explode( '/', $path);

  // discard elements that are too short
  // and prepare for db query
  $segments= array();
  $originalSegments = array();

  // get db instance
  $db = &JFactory::getDBO();
  foreach( $bits as $bit) {

    // for soundex, we keep the whole url
    if (JString::strlen( $bit) >= $minLength) {
      $originalSegments[] = $bit;
    }

    // try break down the request further, based on common replacement character values
    $bit = str_replace( '-', ' ', $bit);
    $bit = str_replace( '_', ' ', $bit);
    $bit = str_replace( '.', ' ', $bit);

    // now we can break down based on spaces
    $subBits = explode( ' ', $bit);

    // keep only the good ones
    foreach( $subBits as $subBit) {
      if ((JString::strlen( $subBit) >= $minLength)
      && JString::strtolower( $subBit) != 'html'
      && JString::strtolower( $subBit) != 'htm'
      && JString::strtolower( $subBit) != 'php'
      ) {
        $segments[] = $subBit;
      }
    }
  }

  // call search function
  $urls = shSearchSimilarUrls( $segments, $originalSegments, $path, $params);

  // return whatever we found
  return $urls;
}

/**
 * Search the sef url and aliases tables for
 * urls similar to the current one
 *
 * @param $bits segment of the requested url, borken down to each individual words in the url
 * @param $originalBits segment of the urls, broken down by only by slashes
 * @param $limit
 * @return unknown_type
 */
function shSearchSimilarUrls( $bits, $originalBits, $searchedPath, $params) {

  // init result
  $urls = array();

  // do we have data to work with ?
  if (empty( $bits)) {
    return $urls;
  }

  // get params we need
  // how many urls to display, max ?
  $limit = $params->get( 'max_number_of_urls', 5);

  // include pdf ?
  $includePdf = $params->get( 'include_pdf', 0);

  // include printable ?
  $includePrint = $params->get( 'include_print', 0);

  // get db instance
  $db = &JFactory::getDBO();
   
  // search the redirection table for similar urls
  $sql = 'select oldurl, newurl, id, dateadd from  #__redirection where newurl <> "" ';

  // virtuemart hack
  $sql .= ' AND oldurl not like ' . $db->Quote( '%vmchk%') ;

  // additional conditions : never include feed results
  $sql .= ' AND newurl not like ' . $db->Quote( '%format=feed%') ;

  // additional user-set conditions
  if (!$includePdf) {
    $sql .= ' AND newurl not like ' . $db->Quote( '%format=pdf%') ;
  }
  if (!$includePrint) {
    $sql .= ' AND newurl not like ' . $db->Quote( '%print=1%') ;
  }

  // apply exclusion list
  $excludedWords = $params->get( 'excluded_words_sef', '');
  if (!empty( $excludedWords)) {
    $words = explode( "\n", $excludedWords);
    foreach( $words as $word) {
      $word = trim( $word);
      if(!empty( $word)) {
        $sql .= ' AND oldurl not like ' . $db->Quote( '%' . $word . '%') ;
      }
    }
  }

  $excludedWords = $params->get( 'excluded_words_non_sef', '');
  if (!empty( $excludedWords)) {
    $words = explode( "\n", $excludedWords);
    foreach( $words as $word) {
      $word = trim( $word);
      if(!empty( $word)) {
        $sql .= ' AND newurl not like ' . $db->Quote( '%' . $word . '%') ;
      }
    }
  }

  // search the redirection table for similar urls
  $sql .= ' AND ( ';

  $sql .= ' soundex(oldurl) = soundex(' . $db->Quote(implode('/',$originalBits)) . ')' ;

  $subSql = array();
  foreach( $bits as $bit) {
    $subSql[] = ' oldurl like ' . $db->Quote( '%' . $bit . '%') ;
  }
  $sql .= ' OR ';
  $sql .= implode( ' OR ', $subSql);
  $sql .= ')';

  // group and limit result set
  $sql .= ' GROUP BY oldurl';
  $sql .= ' limit 500';

  // perform query
  $db->setQuery( $sql);
  $urlList = $db->loadObjectList();
  $urlList = empty( $urlList) ? array() : $urlList;

  // rank them, trying to have the best one near the top of the list
  $urlList = shRankSimilarUrlsSimilarText( $urlList, $searchedPath);

  // only keep a limited number
  $urlList = array_slice( $urlList, 0, $limit);

  // now build an unordered list with the remaining solutions
  reset( $urlList);

  // return whatever we found
  return $urlList;

}

function shFormatSimilarUrls( $urlList) {

  $urls = '';
  if (!empty( $urlList)) {
    foreach( $urlList as $url) {
      $urls .= '<li><a href="' . JRoute::_($url->newurl) . '">' . $url->oldurl . '</a></li>';
    }
    $urls = '<ul>' . $urls . '</ul>';
  }

  return $urls;
}

/**
 * Call back function for usort
 * Compares distance between requested url lenght and
 * candidate url length
 *
 * @param $a
 * @param $b
 * @return unknown_type
 */
function shSortByDistance( $a, $b) {

  if ($a['distance'] == $b['distance']) {
    return 0;
  }
  return ($a['distance'] < $b['distance']) ? -1 : 1;
}

/**
 * Call back function for usort
 * Compares distance between requested url lenght and
 * candidate url length
 *
 * @param $a
 * @param $b
 * @return unknown_type
 */
function shSortByReverseDistance( $a, $b) {

  if ($a['distance'] == $b['distance']) {
    return 0;
  }
  return ($a['distance'] >= $b['distance']) ? -1 : 1;
}

/**
 * Apply a method to put the most appropriate urls
 * at top of list
 *
 * @param array $urls an array of retrieved urls
 * @return array same array, sorted to have most relevant url at offset 0, 1, etc
 */
function shRankSimilarUrlsSimilarText( $urls, $searchedPath) {

  if (empty( $urls)) {
    return $urls;
  }

  // sort by distance
  // first get current sef url
  $shPageInfo = & shRouter::shPageInfo();
  // current path
  $path = JString::trim( $searchedPath);
  $path = JString::trim( $path, '.');

  // create a temporary array indexed ondistance
  // between the lenght of the request and the current similar url
  $tmp = array();
  foreach( $urls as $url) {
    $r = null;
    $distance = similar_text( $url->oldurl, $path, $r);
    $t = array( 'distance' => $r, 'url' => $url);
    $tmp[] = $t;
  }

  // sort this array according to text similarity
  usort( $tmp, 'shSortByReverseDistance');

  // recreate the array we want
  $rankedUrls = array();
  foreach( $tmp as $u) {
    $rankedUrls[] = $u['url'];
  }

  return $rankedUrls;

}
