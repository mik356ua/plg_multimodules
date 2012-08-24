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
    }

    /**
     * @access  public
     * @param array $modules
     * @return  void
     */
    public function onPrepareModuleList(&$modules)
    {
        // Check if it's front-end
        $app = &JFactory::getApplication();
        if ($app->isAdmin()) return;

        // Check for conditions
        if (!$this->conditions) $this->setConditions();

        // Process modules
        foreach ($modules as &$module) {

            $params = new JParameter($module->params);

            if ($multicategories = (array)$params->get('multicategories', array())) {
                // Check for option
                if ($this->conditions['option'] != 'com_multicategories') {
                    $module->published = 0;
                    return;
                }

                // Check for view
                if (!$params->get('multicategories_articles') && $this->conditions['view'] == 'article') {
                    $module->published = 0;
                    return;
                }

                // Check for id
                if (!in_array($this->conditions['id'], $multicategories)) {
                    $module->published = 0;
                    return;
                }
            }
        }
    }

    private function setConditions()
    {
        $option = JRequest::getCmd('option');
        $view = JRequest::getCmd('view');
        $id = JRequest::getInt($view == 'category' ? 'id' : 'catid');

        $this->conditions = array(
            'option' => $option,
            'view' => $view,
            'id' => $id,
        );
    }
}