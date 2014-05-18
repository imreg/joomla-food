<?php
/**
 * default head template file for FoodBranches view of FoodBranch component
 *
 * @version		$Id: default_head.php 2014-05-1 13:27:33Z Imre $
 * @package		FoodBranch
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @author		Imre von Geczy
 * @link
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?><tr>
	<th width="5">
		<?php echo JText::_('COM_FOODBRANCHES_ID'); ?>
	</th>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>			
	<th>
		<?php echo JText::_('COM_FOODBRANCHES_COMPANYNAME'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_FOODBRANCHES_CITY'); ?>
	</th>
</tr>

