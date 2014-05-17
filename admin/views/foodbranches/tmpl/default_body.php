<?php
/**
 * default body template file 
 *
 * @version		
 * @package		
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author		
 * @link		
 * @license		
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

