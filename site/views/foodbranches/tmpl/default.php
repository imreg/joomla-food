<?php
/**
 * @version		$Id: default.php 2014-05-1 13:27:33Z Imre $
 * @package		FoodBranch
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @author		Imre von Geczy
 * @link
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<?php 
JHtml::stylesheet('com_foodbranches/foodbranches.css', false, true, false);
JHtml::script('http://code.jquery.com/jquery-1.9.0.min.js', false, true);
JHtml::script('https://maps.googleapis.com/maps/api/js?sensor=false', false, true);
JHtml::script('com_foodbranches/googleinfobox.js',false,true);
?>

<div class="front-map-container">
    <div class="front-map-content">
        <div id="map-canvas" class="front-map-canvas"></div>
        <div class="front-map-comment"><p><?php echo JText::_('COM_FOODBRANCHES_MORE_INFO') ?></p></div>
    </div>
    <div class="front-map-branch-list">
        <ul>
            <li class="default" onclick="gmap.getPlaces()">
                <span class="company-name-all" onclick="gmap.getPlaces()"><?php echo JText::_('COM_FOODBRANCHES_SEE_ALL_BRANCHES') ?></span>
            </li>
            <?php foreach($this->company_list as $company) : ?>
            <li>
                <span class="company-name" onclick="gmap.postcode('<?php echo $company->address_postcode ?>','<?php echo $company->comment ?>');" longitude="<?php echo $company->longitude ?>" latitude="<?php echo $company->latitude ?>" >
                    <?php echo $company->companyname?>
                </span>
                <span class="company-address">
                    <?php echo  $company->address_city. ' ' . $company->address_street.' '. $company->address_postcode ?>
                </span>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<div class="front-map-clear"></div>

<script src="/media/com_foodbranches/js/google.js" type="text/javascript"></script>
<script type="text/javascript">
	var coordinates = <?php echo( $this->companyname); ?>;
	var gmap = new GMap();
	gmap.setCoordinates(coordinates);
	gmap.getPlaces();
</script>