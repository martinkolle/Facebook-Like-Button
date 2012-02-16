<?php
/**
 * Facebook Like Button for Joomla
 * @package Joomla 2.5
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

		//find the extention_id to the plugin
		$db 	= JFactory::getDBO();
		$query 	= $db->getQuery(true);
		$query->select('extension_id');
		$query->from('#__extensions');
		$query->where('folder = "system" AND element = "vombiefacebooklike"');
		$db->setQuery((string)$query);
		$result = $db->loadResult();

		//We are using a popup to enable the plugin.
		JHTML::_('behavior.modal');

			return '<a style="color:red;font-size:14px;font-weight:bold;" rel="{handler:\'iframe\',size:{x:1000,y:500}}" class="modal" href="index.php?option=com_plugins&task=plugin.edit&extension_id='.$result.'">'.JText::_('MOD_FACEBOOKLIKE_ENABLE_PLUGIN').'</a>';
		else:
			return '<a style="color:green;font-size:14px;font-weight:bold;" rel="{handler:\'iframe\',size:{x:1000,y:500}}" class="modal" href="index.php?option=com_plugins&task=plugin.edit&extension_id='.$result.'">'.JText::_('MOD_FACEBOOKLIKE_ENABLED').'</a>';
		endif;
	}
}