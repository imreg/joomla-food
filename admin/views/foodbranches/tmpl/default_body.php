<?php
/**
 * default body template file 
 * 
 * @version		$Id: default_body.php 46 2014-05-1 13:27:33Z Imre $
 * @package		FoodBranch
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @author		Imre von Geczy
 * @link
 * @license		License GNU General Public License version 2 or later
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
	<tr class="row<?php echo $i % 2; ?>">
		<td>
			<?php echo $item->id; ?>
		</td>
		<td>
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>
		<td>
			<a href="<?php echo JRoute::_('index.php?option=com_foodbranches&task=foodbranch.edit&id=' . $item->id); ?>">
				<?php echo $item->companyname; ?>
			</a>
		</td>
		<td>
			<a href="<?php echo JRoute::_('index.php?option=com_foodbranches&task=foodbranch.edit&id=' . $item->id); ?>">
				<?php echo $item->address_city; ?>
			</a>
		</td>
	</tr>
<?php endforeach; ?>

