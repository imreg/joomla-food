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
defined('_JEXEC') or die;

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * FoodBranches Form Field class for the FoodBranches component
 */
class JFormFieldFoodBranches extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'FoodBranches';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions() 
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id,companyname,address_city');
		$query->from('#__foodbranches');
		$db->setQuery((string)$query);
		$messages = $db->loadObjectList();
		$options = array();
		if ($messages)
		{
			foreach($messages as $message) 
			{
				$options[] = JHtml::_('select.option', $message->id, $message->companyname, $message->address_city);
			}
		}
		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}
