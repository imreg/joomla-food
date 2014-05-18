<?php
/**
 * @version		$Id: foodbranch.php 46 2014-05-1 13:27:33Z Imre $
 * @package		FoodBranch
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @author		Imre von Geczy
 * @link
 * @license		License GNU General Public License version 2 or later
 */


// No direct access
defined('_JEXEC') or die('Restricted access');

// import Joomla table library
jimport('joomla.database.table');

/**
 * FoodBranch of Table
 */
class FoodBranchesTableFoodBranch extends JTable
{
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function __construct(&$db) 
	{
		parent::__construct('#__foodbranches', 'id', $db);
	}
}
