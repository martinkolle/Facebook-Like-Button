<?php

/**
 * Facebook Like Button for Joomla
 * @package plg_vombiefacebooklike
 * @version 1.4
 * @subpackage mod_facebooklike
 * @copyright (C) 2011 KMweb.dk and Martiinkolle.dk
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL v.2
 * @link http://martiinkolle.dk
 **/

defined( '_JEXEC' ) or die;

class plgSystemVombieFacebookLike extends JPlugin
{	

	/**
	* Will add ogp and xmlns to the <html>, so it works in older Internet explore versions. 
	*/

	public function onAfterRender(){

		//only load if frontend
		if($app->isAdmin() || strpos($_SERVER["PHP_SELF"], "index.php") === false){return;}	

		$docType 	= JFactory::getDocument()->getType();
		
		if ($docType == 'html'):
			$app 		= JFactory::getApplication();
			$module 	= JModuleHelper::getModule('mod_facebooklike');
			$moduleParams = new JRegistry();
			$moduleParams->loadString($module->params);
			$title 		= $moduleParams->get('title',false);
			$type 		= $moduleParams->get('type',false);
			$image 		= $moduleParams->get('image',false);
			$ogURL 		= $moduleParams->get('ogURL',false);
			$sitename 	= $moduleParams->get('sitename',false);
			$appID 		= $moduleParams->get('appID',false);
			$OGdesc		= $moduleParams->get('OGdescription',false);

			//add open graph xmlns to the html tag
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