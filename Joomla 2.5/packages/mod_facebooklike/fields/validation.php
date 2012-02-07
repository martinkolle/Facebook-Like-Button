<?php
/**
 * Facebook Like Button for Joomla
 * @package Joomla 1.7
 * @version 1.4
 * @subpackage mod_facebooklike
 * @copyright (C) 2011 KMweb.dk and Martiinkolle.dk
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL v.2 - please keep my link!
 * @link http://martiinkolle.dk
 **/

// No direct access to this file
defined('_JEXEC') or die;

class JFormFieldValidation extends JFormField
{
	var	$type = 'Validation';
 
	function getInput()
	{
		//Include mootools
		JHTML::_('behavior.mootools');

		$document	  = JFactory::getDocument();
		$document->addScriptDeclaration("
window.addEvent('domready', function(){

var link = new Element('a', {
    href: 'https://developers.facebook.com/docs/opengraph/',
    'class': 'graph_documentation',
    html: '".JText::_('MOD_FACEBOOKLIKE_READ_DOC')."',
});
var image = new Element('img', {
    src: '../modules/mod_facebooklike/fields/open_graph_help.png',
    'class': 'graph_image',
});
	$$('p.tip').adopt(link);
	$$('p.tip').adopt(image);
});

		","text/javascript");
		$document->addStyleDeclaration('
		#jform_params___field1-lbl{display:none;}
		span.spacer span{font-weight:bold;}
		span.spacer span label{background:#F4F4F4; padding:5px; border-radius:5px; padding-right:0px; color:#EB8207 !important;}
		.panelform .adminformlist input{font-size:14px; border: 1px solid #ccc; border-radius:3px;}
		.panelform .adminformlist select{font-size:12px;}
		.panelform .adminformlist label{color:#146295; font-weight:bold; font-size:13px;}
		#jform_params_loadApi-lbl span{float: right;position: absolute;left: 250px;color:red;}
		/*#jform_params_autoDetectUrl-lbl{min-width:130px;}Danish.lang hack::debug enabled*/
		p.tip{margin-top:10px;font-size:14px;max-width:100% !important;}
		p.tip img{height:200px; margin-top:10px;}
		'
		);
	}
}