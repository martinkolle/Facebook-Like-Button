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
		//add css
		$document	  = JFactory::getDocument();
		$document->addStyleDeclaration('
		span.spacer span{font-weight:bold;}
		span.spacer span label{background:#F4F6F7; padding:10px!important; border-radius:5px; color:#FD8F19 !important; font-family: \'Open Sans\', sans-serif; font-size:18px;}
		button.modal{font-size:13px;}
		.alert{width:35%;}
		div.control-label label{color:#13294A;font-size:16px;font-weight:bold;}
		');
	$result = null;
	$html 	= null;
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

			$html .= '<a class="btn btn-small btn-danger modal" OnClick="location.href = \'index.php?option=com_plugins&task=plugin.edit&extension_id='.$result.'\';">'.JText::_('MOD_FACEBOOKLIKE_ENABLE_PLUGIN').'</a>';
		else:
			$html .= '<button class="btn btn-small btn-success" onclick="return;">'.JText::_('MOD_FACEBOOKLIKE_ENABLED').'</button>';
		endif;
	return $html;
	}
}