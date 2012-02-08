<?php
/**
 * Facebook Like Button for Joomla
 * @package Joomla 1.7
 * @version 1.4
 * @subpackage mod_facebooklike
 * @copyright (C) 2011 KMweb.dk and Martiinkolle.dk
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL v.2
 * @link http://martiinkolle.dk
 **/

// No direct access to this file
defined('_JEXEC') or die;

class JFormFieldopengraph extends JFormField
{
	var	$type = 'Opengraph';
 
	function getInput()
	{
		$enabled = JPluginHelper::isEnabled('system', 'vombiefacebooklike');
		if(!$enabled):
			return '<a style="color:red;font-size:14px;font-weight:bold;" href="index.php?option=com_plugins&view=plugins&filter_search=facebook%20like">'.JText::_('MOD_FACEBOOKLIKE_ENABLE_PLUGIN').'</a>';
		endif;
	}
}