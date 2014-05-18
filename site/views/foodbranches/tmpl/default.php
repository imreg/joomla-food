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

<div id="map-canvas" class="front-map-canvas"></div>
<div class="front-more-info"><p>Click on the flag for more information</p></div>
<script src="/media/com_foodbranches/js/google.js" type="text/javascript"></script>
<script type="text/javascript">
	var coordinates = <?php echo( $this->companyname); ?>;
	Map.init();
	Map.setCoordinates(coordinates);
	Map.getPlaces();
</script>