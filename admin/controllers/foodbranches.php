<?php
/**
 * @version		$Id: foodbranches.php 46 2014-05-1 13:27:33Z Imre $
 * @package		FoodBranch
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @author		Imre von Geczy
 * @link		
 * @license		License GNU General Public License version 2 or later
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');

/**
 * FoodBranches Controller
 */
class FoodBranchesControllerFoodBranches extends JControllerAdmin
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function getModel($name = 'FoodBranches', $prefix = 'FoodBranchesModel') 
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}
