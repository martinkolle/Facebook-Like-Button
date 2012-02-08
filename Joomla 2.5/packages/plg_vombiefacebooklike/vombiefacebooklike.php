<?php

/**
 * Facebook Like Button for Joomla
 * @package Joomla 1.6 | Joomla 1.7 | Joomla 2.5
 * @version 1.4
 * @subpackage plg_vombieFacebookLike
 * @copyright (C) 2011 KMweb.dk and Martiinkolle.dk
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL v.2
 * @link http://martiinkolle.dk
 **/

defined( '_JEXEC' ) or die;

class plgSystemVombieFacebookLike extends JPlugin
{	

	/**
	* Will add ogp and xmlns to the <html> to get Open Graph to work. 
	*/

	public function onAfterRender()
	{
		$app = &JFactory::getApplication();

		$module = JModuleHelper::getModule('mod_facebooklike');
		$moduleParams = new JRegistry();
		$moduleParams->loadString($module->params);
		$title 		= $moduleParams->get('title',null);
		$type 		= $moduleParams->get('type',null);
		$image 		= $moduleParams->get('image',null);
		$ogURL 		= $moduleParams->get('ogURL',null);
		$sitename 	= $moduleParams->get('sitename',null);
		$appID 		= $moduleParams->get('appID',null);

		if($app->isAdmin() || strpos($_SERVER["PHP_SELF"], "index.php") === false)
		{
			return;
		}

		if ($title || $type || $image || $ogURL || $sitename || $appID) {
				$buffer = JResponse::getBody();
				$buffer = str_replace ("<html", '<html xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml" ', $buffer);
				JResponse::setBody($buffer);
			return true;
		}
	}
}
?>