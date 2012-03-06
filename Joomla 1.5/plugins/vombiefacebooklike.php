<?php

/**
 * Facebook Like Button for Joomla
 * @package Joomla 1.5
 * @version 1.4
 * @subpackage plg_vombieFacebookLike
 * @copyright (C) 2011 KMweb.dk and Martiinkolle.dk
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL v.2
 * @link http://martiinkolle.dk
 **/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.plugin.plugin' );

class plgSystemVombieFacebookLike extends JPlugin
{	

	/**
	* Will add ogp and xmlns to the <html> to get Open Graph to work. 
	*/

	public function onAfterRender()
	{

	$document 	= &JFactory::getDocument();
	$docType	= $document->getType();
	
	if ($docType == 'html'):		
		$app 		= &JFactory::getApplication();
		$module 	= JModuleHelper::getModule('mod_facebooklike');
		$moduleParams = new JRegistry();
		$moduleParams->loadString($module->params);
		$title 		= $moduleParams->get('title',);
		$type 		= $moduleParams->get('type',);
		$image 		= $moduleParams->get('image',);
		$ogURL 		= $moduleParams->get('ogURL',);
		$sitename 	= $moduleParams->get('sitename',);
		$appID 		= $moduleParams->get('appID',);
		$OGdesc		= $moduleParams->get('ogDESC',)

		if($app->isAdmin() || strpos($_SERVER["PHP_SELF"], "index.php") === false)
		{
			return;
		}

		if ($title || $type || $image || $ogURL || $sitename || $appID || $OGdesc) {
				$buffer = JResponse::getBody();
				$buffer = str_replace ("<html", '<html xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml" ', $buffer);
				JResponse::setBody($buffer);
			return true;
		}
	endif;
	}
}
?>