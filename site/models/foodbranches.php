<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 * @since       1.5
 */
class BookingModelBooking extends JModelForm {

    /**
     * @since   1.6
     */
    protected $view_item = 'booking';
    protected $_item = null;

    /**
     * Model context string.
     *
     * @var		string
     */
    protected $_context = 'com_booking.booking';

    protected function populateState() {
        $app = JFactory::getApplication('site');

        // Load state from the request.
        $pk = $app->input->getInt('id');
        $this->setState('booking.id', $pk);

        // Load the parameters.
        $params = $app->getParams();
        $this->setState('params', $params);
    }

    /**
     * Method to get the contact form.
     *
     * The base form is loaded from XML and then an event is fired
     *
     *
     * @param   array  $data		An optional array of data for the form to interrogate.
     * @param   boolean	$loadData	True if the form is to load its own data (default case), false if not.
     * @return  JForm	A JForm object on success, false on failure
     * @since   1.6
     */
    public function getForm($data = array(), $loadData = true) {

        $form = $this->loadForm('com_booking.booking', 'booking', array('control' => 'jform', 'load_data' => true));
        //$data = array('test' => "faszom");
        $id = $this->getState('booking.id');
        $this->title = $this->getTitle();
        $this->tattoo = $this->getTattoo();

        if (is_array($_POST) || count($_POST)) {
            $data = new stdClass();
            if (isset($_POST['title'])) {
                $data->title = htmlspecialchars($_POST['title'], ENT_QUOTES);
            }
            if (isset($_POST['firstname'])) {
                $data->firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES);
            }
            if (isset($_POST['secondname'])) {
                $data->secondname = htmlspecialchars($_POST['secondname'], ENT_QUOTES);
            }
            if (isset($_POST['telephone'])) {
                $data->telephone = htmlspecialchars($_POST['telephone'], ENT_QUOTES);
            }
            if (isset($_POST['mobile'])) {
                $data->mobile = htmlspecialchars($_POST['mobile'], ENT_QUOTES);
            }
            if (isset($_POST['email'])) {
                $data->email = htmlspecialchars($_POST['email'], ENT_QUOTES);
            }
            if (isset($_POST['childbirthday'])) {
                $data->childbirthday = htmlspecialchars($_POST['childbirthday'], ENT_QUOTES);
            }
            if (isset($_POST['event_type'])) {
                $data->event = htmlspecialchars($_POST['event_type'], ENT_QUOTES);
            }
            if (isset($_POST['tattoo'])) {
                $data->tattoo = htmlspecialchars($_POST['tattoo'], ENT_QUOTES);
            }
            if (isset($_POST['party_start_time'])) {
                $data->party_start_time = htmlspecialchars($_POST['party_start_time'], ENT_QUOTES);
            }
            if (isset($_POST['party_end_time'])) {
                $data->party_end_time = htmlspecialchars($_POST['party_end_time'], ENT_QUOTES);
            }
            if (isset($_POST['party_date'])) {
                $data->party_date = htmlspecialchars($_POST['party_date'], ENT_QUOTES);
            }
            if (isset($_POST['venue_address_street'])) {
                $data->venue_address_street = htmlspecialchars($_POST['venue_address_street'], ENT_QUOTES);
            }
            if (isset($_POST['venue_address_town'])) {
                $data->venue_address_town = htmlspecialchars($_POST['venue_address_town'], ENT_QUOTES);
            }
            if (isset($_POST['venue_address_postcode'])) {
                $data->venue_address_postcode = htmlspecialchars($_POST['venue_address_postcode'], ENT_QUOTES);
            }
            if (isset($_POST['venue_telephone'])) {
                $data->venue_telephone = htmlspecialchars($_POST['venue_telephone'], ENT_QUOTES);
            }
            if (isset($_POST['event_lenght'])) {
                //$data->event_lenght = htmlspecialchars($_POST['event_lenght'],ENT_QUOTES);
            }
            if (isset($_POST['instruction'])) {
                $data->instruction = htmlspecialchars($_POST['instruction'], ENT_QUOTES);
            }
            $this->storeData($data);
        }

        return $form;
    }

    protected function loadForm($name, $source = null, $options = array(), $clear = false, $xpath = false) {
        parent::loadForm($name, $source, $options, $clear, $xpath);
    }

    private function getTitle() {
        $table = '#__booking_title';
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('a.title AS title');
        $query->from($table . ' AS a');

        $db->setQuery($query);

        return $db->loadObjectList();
    }

    private function getTattoo() {
        $table = '#__booking_tattoos';
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('a.tattoo AS tattoo');
        $query->from($table . ' AS a');

        $db->setQuery($query);

        return $db->loadObjectList();
    }

    private function storeData($data) {
        $db = JFactory::getDBO();
        $table = '#__booking_details';
        try {
            $db->insertObject($table, $data);
        } catch (Exception $e) {
            var_dump($e);
            var_dump($data);
        }
    }

    private function _sendEmail($data, $contact) {
        $app = JFactory::getApplication();
        $params = JComponentHelper::getParams('com_contact');
        if ($contact->email_to == '' && $contact->user_id != 0) {
            $contact_user = JUser::getInstance($contact->user_id);
            $contact->email_to = $contact_user->get('email');
        }
        $mailfrom = $app->getCfg('mailfrom');
        $fromname = $app->getCfg('fromname');
        $sitename = $app->getCfg('sitename');
        $copytext = JText::sprintf('COM_CONTACT_COPYTEXT_OF', $contact->name, $sitename);

        $name = $data['contact_name'];
        $email = $data['contact_email'];
        $subject = $data['contact_subject'];
        $body = $data['contact_message'];

        // Prepare email body
        $prefix = JText::sprintf('COM_CONTACT_ENQUIRY_TEXT', JURI::base());
        $body = $prefix . "\n" . $name . ' <' . $email . '>' . "\r\n\r\n" . stripslashes($body);

        $mail = JFactory::getMailer();
        $mail->addRecipient($contact->email_to);
        $mail->addReplyTo(array($email, $name));
        $mail->setSender(array($mailfrom, $fromname));
        $mail->setSubject($sitename . ': ' . $subject);
        $mail->setBody($body);
        $sent = $mail->Send();
        
        return $sent;
    }

}

