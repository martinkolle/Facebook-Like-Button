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
		#jform_params___field1-lbl{display:none;}
		span.spacer span{font-weight:bold;}
		span.spacer span label{background:#F4F4F4; padding:5px; border-radius:5px; padding-right:0px; color:#EB8207 !important;}
		.panelform .adminformlist input{font-size:14px; border: 1px solid #ccc; border-radius:3px;}
		.panelform .adminformlist select{font-size:12px;}
		.panelform .adminformlist label{color:#146295; font-weight:bold; font-size:13px;}
		#jform_params_loadApi-lbl span{float: right;position: absolute;left: 250px;color:red;}
		p.tip img{height:200px; margin-top:10px;}
		.x{background-image:url(templates/bluestork/images/admin/publish_x.png);background-repeat:no-repeat;}
		.tick{background-image:url(templates/bluestork/images/admin/tick.png);background-repeat:no-repeat;}
		.plugin{font-size:14px;font-weight:bold;width:100%;padding-left:18px;}
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
			//We are using a popup to enable the plugin.
			JHTML::_('behavior.modal');

			$html .= '<a class="x plugin modal" style="color:red;" rel="{handler:\'iframe\',size:{x:1000,y:500}}" class="modal" href="index.php?option=com_plugins&task=plugin.edit&extension_id='.$result.'">'.JText::_('MOD_FACEBOOKLIKE_ENABLE_PLUGIN').'</a>';
		else:
			$html .= '<span class="tick plugin" style="color:green;">'.JText::_('MOD_FACEBOOKLIKE_ENABLED').'</span>';
		endif;
		$html .= '<p style="width:100%" class="tip">'.JText::_('MOD_FACEBOOKLIKE_OPENGRAPH_DESC').'<img src="../modules/mod_facebooklike/fields/open_graph_help.png" class="graph_image"></p>';
	return $html;
	}
}