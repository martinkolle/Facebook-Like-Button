<?php
/**
 * Facebook Like Button for Joomla
 * @package Joomla 1.5
 * @version 1.4
 * @subpackage mod_facebooklike
 * @copyright (C) 2011 KMweb.dk and Martiinkolle.dk
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL v.2 - please keep my link!
 * @link http://martiinkolle.dk
 **/

// No direct access to this file
defined('_JEXEC') or die;
  
/**
*	This will add a js code to the page
**/
class JElementValidation extends JElement
{
	var	$_name = 'Validation';
 
/**
* 	This will add the JS code to the page.
**/
	function fetchElement()
	{
		//Include mootools
		JHTML::_('behavior.mootools');

		$document	  = JFactory::getDocument();
		$text = JText::_('MOD_FACEBOOKLIKE_LOAD_FILE');

		$document->addStyleDeclaration('
		#jform_params___field1-lbl{display:none;}
		.paramlist_value{font-weight:bold;}
		.paramlist_value{background:#F4F4F4; padding:5px; border-radius:5px; padding-right:0px; color:#EB8207 !important; font-size:14px;}
		.paramlist input{font-size:14px; border: 1px solid #ccc; border-radius:3px;}
		.paramlist select{font-size:12px;}
		.paramlist label{color:#146295; font-weight:bold; font-size:13px;}
		/*Error message*/
		#jform_params_loadApi-lbl span{float: right;position: absolute;left: 250px;color:red;}');
	}
}