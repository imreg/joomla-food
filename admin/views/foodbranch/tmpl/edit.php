<?php
/**
 * @version		
 * @package	
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author
 * @link
 * @license
 */
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
?>

<form action="<?php echo JRoute::_('index.php?option=com_foodbranches&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="foodbranches-form">
	<div class="width-50 fltlft">
		<fieldset class="adminform">
			<legend><?php echo empty($this->item->id) ? JText::_('COM_FOODBRANCHES_NEW') : JText::sprintf('COM_FOODBRANCHES_EDIT', $this->item->id); ?></legend>
			<ul class="adminformlist">
				<li><?php echo $this->form->getLabel('companyname'); ?>
				<?php echo $this->form->getInput('companyname'); ?></li>
			</ul>
		</fieldset>
		<fieldset class="adminform">
			<ul class="adminformlist">
				<li><?php echo $this->form->getLabel('firstname'); ?>
				<?php echo $this->form->getInput('firstname'); ?></li>
				<li><?php echo $this->form->getLabel('secondname'); ?>
				<?php echo $this->form->getInput('secondname'); ?></li>
			</ul>
		</fieldset>
		<fieldset class="adminform">
			<ul class="adminformlist">				
				<li><?php echo $this->form->getLabel('telephone'); ?>
				<?php echo $this->form->getInput('telephone'); ?></li>
				<li><?php echo $this->form->getLabel('mobile'); ?>
				<?php echo $this->form->getInput('mobile'); ?></li>
				<li><?php echo $this->form->getLabel('email'); ?>
				<?php echo $this->form->getInput('email'); ?></li>
			</ul>
		</fieldset>
		<fieldset class="adminform">
			<ul class="adminformlist">				
				<li><?php echo $this->form->getLabel('address_city'); ?>
				<?php echo $this->form->getInput('address_city'); ?></li>
				<li><?php echo $this->form->getLabel('address_street'); ?>
				<?php echo $this->form->getInput('address_street'); ?></li>
				<li><?php echo $this->form->getLabel('address_postcode'); ?>
				<?php echo $this->form->getInput('address_postcode'); ?></li>
			</ul>
		</fieldset>
		<fieldset class="adminform">
			<ul class="adminformlist">
				
				<li><?php echo $this->form->getLabel('comment'); ?>
				<?php echo $this->form->getInput('comment'); ?></li>
			</ul>
		</fieldset>
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_FOODBRANCHES_COORDINATE') ?></legend>
			<ul class="adminformlist">
				<li><?php echo $this->form->getLabel('latitude'); ?>
				<?php echo $this->form->getInput('latitude'); ?></li>
				<li><?php echo $this->form->getLabel('longitude'); ?>
				<?php echo $this->form->getInput('longitude'); ?></li>
			</ul>
		</fieldset>
	</div>
        <div>
		<input type="hidden" name="task" value="foodbranches.edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
<div class="width-50 fltlft">
	<fieldset class="adminform">
			<legend><?php echo JText::_('COM_FOODBRANCHES_GOOGLE_MAP'); ?></legend>
			<div id="map-canvas"></div>
	</fieldset>			
</div>	

