<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
defined('_JEXEC') or die;

$controller = JControllerLegacy::getInstance('Foodbranches');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();

?>
