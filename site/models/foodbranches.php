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
defined ( '_JEXEC' ) or die ( 'Restricted access' );

// import Joomla modelitem library
jimport ( 'joomla.application.component.modelitem' );

/**
 * FoodBranches Model
 */
class FoodBranchesModelFoodBranches extends JModelItem {

	public function getCompany() {
		$table = '#__foodbranches';
		$db = JFactory::getDBO ();
		
		$query = $db->getQuery ( true );
		$query->select ( '*');
		$query->from ( $table );
		
		$db->setQuery ( $query );
		return json_encode($db->loadObjectList());
	}
}
