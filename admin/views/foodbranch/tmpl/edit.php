<?php
/**
 * @version		$Id: edit.php 46 2014-05-1 13:27:33Z Imre $
 * @package		FoodBranch
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @author		Imre von Geczy
 * @link
 * @license		License GNU General Public License version 2 or later
 */

// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
?>
<?php 
JHtml::stylesheet('com_foodbranches/foodbranches.css', false, true, false);
JHtml::script('http://code.jquery.com/jquery-1.9.0.min.js', false, true);
JHtml::script('https://maps.googleapis.com/maps/api/js?sensor=false', false, true); 
JHtml::script('com_foodbranches/googleinfobox.js',false,true);
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
			<ul class="adminformlist">				
				<li><?php echo $this->form->getLabel('is_comment'); ?>
				<?php echo $this->form->getInput('is_comment'); ?></li>
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
			<div class="map-adminframe">
				<div id="map-canvas" class="admin-map-canvas"></div>
				<button onclick="Map.checkPlace();">Place Check</button>
			</div>
	</fieldset>			
</div>	
<div class="infobox-wrapper">
    <div id="infobox">
        The contents of your info box. It's very easy to create and customize.
    </div>
</div>
<script src="/media/com_foodbranches/js/google.js" type="text/javascript"></script>
<script type="text/javascript">
	Map.init();
	Map.postcodeListener();
</script>
