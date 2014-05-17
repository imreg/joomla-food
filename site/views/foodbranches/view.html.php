<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
defined('_JEXEC') or die;

/**
 * Search HTML view class for the Finder package.
 *
 * @package     Joomla.Site
 * @subpackage  com_finder
 * @since       2.5
 */
class BookingViewBooking extends JViewLegacy
{
    
    protected $item;
    protected $pagination;
    protected $state;

    /**
	 * Method to display the view.
	 *
	 * @param   string  $tpl  A template file to load. [optional]
	 *
	 * @return  mixed  JError object on failure, void on success.
	 *
	 * @since   2.5
	 */
	public function display($tpl = null)
	{
		$app = JFactory::getApplication();
		$this->params = $app->getParams();

                $this->helpparams = JComponentHelper::getParams('com_booking');
                
		$dispatcher = JEventDispatcher::getInstance();
		$this->form	= $this->get('Form');
                $this->item = "faszom";
                parent::display($tpl);
        }
}
?>
