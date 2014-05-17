<?php

defined('_JEXEC') or die;

?>
<form id="mod-booking-inputform" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-input">
    <fieldset>
        <legend>Book an appointment. All fields with an * are required.</legend>    
        <div class="booking">
            <label for="name">Title</label><?php ?>
            <select class="chzn-single" name="title" id="title">
                    <?php foreach( $this->_models['booking']->title as $key => $value): ?>
                    <option value="<?php echo $value->title ?>"><?php echo $value->title ?></option>
                    <?php endforeach; ?>
            </select>

            <label for="name">First Name</label>
            <input id="name" class="" type="text" placeholder="First Name" value="" name="firstname">
            <label for="name">Second Name</label>
            <input id="name" class="" type="text" placeholder="Second Name" value="" name="secondname">
            <label for="telephone">Telephone Number</label>
            <input id="telephone" class="" type="text" placeholder="Telephone Number" value="" name="telephone">
            <label for="mobile">Mobile Number</label>
            <input id="mobile" class="" type="text" placeholder="Mobile Number" value="" name="mobile">
            <label for="email">E-mail</label>
            <input id="email" class="" type="text" placeholder="E-mail" value="" name="email">
            <label for="childbirthday">Child Birthday</label>
            <input id="childbirthday" class="" type="text" placeholder="Child Birthday" value="" name="childbirthday">
            <label for="event_type">Event type</label>
            <input id="event_type" class="" type="text" placeholder="Event type" value="" name="event_type">
            <label for="event_type">Tattoos</label>
            
            <select class="chzn-single" name="tattoo" id="tattoo">
                    <?php foreach( $this->_models['booking']->tattoo as $key => $value): ?>
                        <option value="<?php echo $value->tattoo ?>"><?php echo $value->tattoo; ?></option>
                    <?php endforeach; ?>
            </select>

            <label for="party_from_time">Party time</label>
            <input id="party_from_time" class="" type="text" placeholder="Party time from" value="" name="party_start_time">
            <input id="party_end_time" class="" type="text" placeholder="Party time to" value="" name="party_end_time">
            <label for="party_date">Party date</label>
            <input id="party_date" class="" type="text" placeholder="Party date" value="" name="party_date">
            
            <label for="venue_address_street">Venue address</label>
            <div><input id="venue_address_street" class="" type="text" placeholder="Venue Street number and name" value="" name="venue_address_street"></div>
            <div><input id="venue_address_town" class="" type="text" placeholder="Venue Town" value="" name="venue_address_town"></div>
            <div><input id="venue_address_postcode" class="" type="text" placeholder="Venue Postcode" value="" name="venue_address_postcode"></div>
            
            <label for="venue_telephone">Venue telephone number</label>
            <input id="venue_telephone" class="" type="text" placeholder="Venue telephone number" value="" name="venue_telephone">
            <!-- label for="event_lenght">Lenght of event</label>
            <input id="event_lenght" class="" type="text" placeholder="Lenght of event" value="" name="event_lenght" -->
            <label for="instruction">Special instruction</label>
            <textarea id="instruction" class="" cols="80" maxlength="140" rows="4" placeholder="Tell us what is your special instruction in 140 characters max" name="instruction"></textarea>        
            <div>                
                <button class="btn btn-primary validate" type="submit">Submit</button>
            </div>
        </div>
    </fieldset>
</form>