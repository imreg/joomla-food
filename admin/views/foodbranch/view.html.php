<?php
/**
 * @version		$Id: view.html.php 46 2014-05-1 13:27:33Z Imre $
 * @package		FoodBranch
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @author		Imre von Geczy
 * @link
 * @license		License GNU General Public License version 2 or later
 */


// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * FoodBranch View
 */
class FoodBranchesViewFoodBranch extends JView
{
	/**
	 * display method 
	 * @return void
	 */
	public function display($tpl = null) 
	{
		// get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign the Data
		$this->form = $form;
		$this->item = $item;

		// Set the toolbar
		$this->addToolBar();
	
		// Display the template
		parent::display($tpl);
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		JRequest::setVar('hidemainmenu', true);
		$isNew = ($this->item->id == 0);
		JToolBarHelper::title($isNew ? JText::_('COM_FOODBRANCHES_NEW') : JText::_('COM_FOODBRANCHES_EDIT'));
		JToolBarHelper::save('foodbranch.save');
		JToolBarHelper::cancel('foodbranch.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}
}
