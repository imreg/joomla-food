<?php

/**
 * @version		$Id: foodbranches.php 2014-05-1 13:27:33Z Imre $
 * @package		FoodBranch
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @author		Imre von Geczy
 * @link
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

/**
 * FoodBranches Model
 */
class FoodBranchesModelFoodBranches extends JModelItem {

    private $_results = '';
    
    public function __construct($config = array()) {
        parent::__construct($config);
        $this->_init();
    }

    public function _init() {
        $table = '#__foodbranches';
        $db = JFactory::getDBO();

        $query = $db->getQuery(true);
        $query->select('*');
        $query->from($table);

        $db->setQuery($query);
        
        $this->_results = $db->loadObjectList();
    }

    public function getAjax_Company() {
        return json_encode($this->_results);
    }
    public function getCompany() {
        return $this->_results;
    }
}
