<?php
/**
 * @extension   MultiModules System Plugin for Joomla!1.5
 * @copyright   Copyright (c) Mike Milkman, 2010. All rights reserved
 * @license     GNU/GPL, see entire document at http://www.gnu.org/licenses/gpl-2.0.html
 * @website     http://milkdev.com
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

// Importing Joomla! Plugin library file
jimport('joomla.plugin.plugin');
jimport('joomla.user.helper');

/**
 * MultiModules System Plugin
 */
class plgSystemMultiModules extends JPlugin
{

    /**
     * @var array
     */
    private $conditions = array();

    /**
     * @param $subject
     * @param $params
     */
    public function __construct(&$subject, $params)
    {
        parent::__construct($subject, $params);

        $option = JRequest::getCmd('option');
        $view = JRequest::getCmd('view');
        $id = JRequest::getCmd($view == 'category' ? 'id' : 'catid');

        $this->conditions = array(
            'option' => $option,
            'view' => $view,
            'id' => $id,
        );
    }

    /**
     * @access  public
     * @return  void
     */
    function onAfterInitialise()
    {
        // Checking if it's front-end
        $app = &JFactory::getApplication();
        if ($app->isAdmin()) return;
    }

    /**
     * @access  public
     * @return  void
     */
    function onAfterRoute()
    {
        // Checking if it's front-end
        $app = &JFactory::getApplication();
        if ($app->isAdmin()) return;
    }

    /**
     * @access  public
     * @return  void
     */
    function onAfterDispatch()
    {
        // Checking if it's front-end
        $app = &JFactory::getApplication();
        if ($app->isAdmin()) return;
    }

    /**
     * @access  public
     * @return  void
     */
    function onAfterRender()
    {
        // Checking if it's front-end
        $app = &JFactory::getApplication();
        if ($app->isAdmin()) return;
    }

}