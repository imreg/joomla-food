<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller
 *
 * @category Expression category is undefined on line 10, column 16 in Templates/Scripting/PHPClass.php.
 * @package Expression package is undefined on line 11, column 15 in Templates/Scripting/PHPClass.php.
 * @author imre
 */
defined('_JEXEC') or die;

class FoodbranchesController extends JControllerLegacy {

    public function display($cachable = false, $urlparams = false) {
        $cachable = true;

        // Get the document object.
        $document = JFactory::getDocument();

        // Set the default view name and format from the Request.
        $vName = $this->input->get('view', 'categories');
        $this->input->set('view', $vName);

        $user = JFactory::getUser();

        $safeurlparams = array('catid' => 'INT', 
        						'id' => 'INT', 
        						'cid' => 'ARRAY', 
        						'year' => 'INT', 
        						'month' => 'INT', 
        						'limit' => 'UINT', 
        						'limitstart' => 'UINT',
            					'showall' => 'INT', 
        						'return' => 'BASE64', 
        						'filter' => 'STRING', 
        						'filter_order' => 'CMD', 
        						'filter_order_Dir' => 'CMD', 
        						'filter-search' => 'STRING', 
        						'print' => 'BOOLEAN', 
        						'lang' => 'CMD');

        parent::display($cachable, $safeurlparams);

        return $this;
    }

}

?>
