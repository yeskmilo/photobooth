<?php
/**
 * SEF module for Joomla!
 *
 * @author      $Author: shumisha $
 * @copyright   Yannick Gaultier - 2007-2010
 * @package     sh404SEF-15
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version     $Id: view.html.php 1733 2011-01-19 19:50:50Z silianacom-svn $
 */

// Security check to ensure this file is being included by a parent file.
if (!defined('_JEXEC')) die('Direct Access to this location is not allowed.');

jimport( 'joomla.application.component.view');

class Sh404sefViewDefault extends JView {

  public function display( $tpl = null) {

    // prepare the view, based on layout
    $method = '_makeView' . ucfirst( $this->getLayout());
    if (is_callable( array( $this, $method))) {
      $this->$method();
    }

    parent::display($tpl = null);
  }

  /**
   * Attach css, js and create toolbar for default view
   *
   * @param midxed $params
   */
  private function _makeViewDefault( $params = null) {

    global $mainframe;

    // prepare database stats, etc
    $this->_prepareControlPanelData();

    // add behaviors and styles as needed
    $modalSelector = 'a.modalediturl';
    $js= '\\function(){shAlreadySqueezed = false;if(parent.shReloadModal) {parent.window.location=\'index.php?option=com_sh404sef\';parent.shReloadModal=true}}';
    $params = array( 'overlayOpacity' => 0, 'classWindow' => 'sh404sef-popup', 'classOverlay' => 'sh404sef-popup', 'onClose' => $js);
    Sh404sefHelperHtml::modal( $modalSelector, $params);

    // add our javascript
    JHTML::script( 'cp.js', Sh404sefHelperGeneral::getComponentUrl() . '/assets/js/');

    // add analytics and other ajax calls loader
    $sefConfig = & shRouter::shGetConfig();
    $analyticsBootstrap = $sefConfig->analyticsReportsEnabled ? 'shSetupAnalytics({report:"dashboard",showFilters:"no"});' : '';
    $js = 'window.addEvent(\'domready\', function(){ ' . $analyticsBootstrap . '  shSetupQuickControl(); shSetupSecStats(); shSetupUpdates();});';
    $document = & JFactory::getDocument();
    $document->addScriptDeclaration( $js);

    // add our own css
    JHtml::styleSheet( 'cp.css', Sh404sefHelperGeneral::getComponentUrl() . '/assets/css/');

    // import tabs
    jimport('joomla.html.pane');

    // add tooltips handler
    JHTML::_('behavior.tooltip');

    // add title
    $title = Sh404sefHelperGeneral::makeToolbarTitle( JText16::_('COM_SH404SEF_CONTROL_PANEL'), $icon = 'sh404sef', $class = 'sh404sef-toolbar-title');
    $mainframe->set('JComponentTitle', $title);

    // add space for our ajax progress indicator

    // Get the JComponent instance of JToolBar
    $bar = & JToolBar::getInstance('toolbar');

    // add a div to display our ajax-call-in-progress indicator
    $bar->addButtonPath( JPATH_COMPONENT . DS . 'classes');
    $html = '<div id="sh-progress-cpprogress"></div>';
    $bar->appendButton( 'custom', $html, 'sh-progress-button-cpprogress');

  }

  /**
   * Attach css, js and create toolbar for Info view
   *
   * @param midxed $params
   */
  private function _makeViewInfo( $params = null) {

    global $mainframe;

    // add our own css
    JHtml::styleSheet( 'list.css', Sh404sefHelperGeneral::getComponentUrl() . '/assets/css/');

    // decide on help file language
    $lang =& JFactory::getLanguage();
    $languageName = $lang->get('backwardlang', 'english');
    $basePath = JPATH_ROOT . '/administrator/components/com_sh404sef/language/%s.readme.php';
    // fall back to english if language readme does not exist
    jimport('joomla.filesystem.file');
    if(!JFile::exists( sprintf( $basePath, $languageName))) {
      $languageName = 'english';
    }
    $this->assign( 'readmeFilename', sprintf( $basePath, $languageName));

    // add title
    $title = Sh404sefHelperGeneral::makeToolbarTitle( JText16::_('COM_SH404SEF_TITLE_SUPPORT'), $icon = 'sh404sef', $class = 'sh404sef-toolbar-title');
    $mainframe->set('JComponentTitle', $title);


  }

  private function _prepareControlPanelData() {

    $sefConfig = & shRouter::shGetConfig();
    $this->assign( 'sefConfig', $sefConfig);


    // update information
    $versionsInfo = Sh404sefHelperUpdates::getUpdatesInfos();
    $this->assign( 'updates', $versionsInfo);

    // url databases stats
    $database =& JFactory::getDBO();
    $sql = 'SELECT count(*) FROM #__redirection WHERE ';
    $database->setQuery($sql. "`dateadd` > '0000-00-00' and `newurl` = '' "); // 404
    $Count404 = $database->loadResult();
    $database->setQuery($sql. "`dateadd` > '0000-00-00' and `newurl` != '' " ); // custom
    $customCount = $database->loadResult();
    $database->setQuery($sql. "`dateadd` = '0000-00-00'"); // regular
    $sefCount = $database->loadResult();
    // calculate security stats
    $default = empty($sefConfig->shSecLastUpdated) ? '- -' : '0';

    $this->assign( 'sefCount', $sefCount);
    $this->assign( 'Count404', $Count404);
    $this->assign( 'customCount', $customCount);

  }

}