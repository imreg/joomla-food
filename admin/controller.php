<?php

/**
 * @version		$Id: controller.php 2014-05-1 13:27:33Z Imre $
 * @package		FoodBranch
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @author		Imre von Geczy
 * @link
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * General Controller of FoodBranches component
 */
class FoodBranchesController extends JController
{
	/**
	 * display task
	 *
	 * @return void
	 */
	function display($cachable = false) 
	{
		// set default view if not set
		JRequest::setVar('view', JRequest::getCmd('view', 'FoodBranches'));

		// call parent behavior
		//parent::display($cachable);
		parent::display(false);
	}
}
