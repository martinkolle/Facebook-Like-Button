<?php
/**
 * Facebook Like Button for Joomla
 * @package Joomla 3.0
 * @version 1.4.6
 * @subpackage mod_facebooklike
 * @copyright (C) 2011 KMweb.dk and Martiinkolle.dk
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL v.2
 * @link http://martiinkolle.dk
 **/

// no direct access
defined('_JEXEC') or die;

//Load general things
$document	  = JFactory::getDocument();
$lang		  = JFactory::getLanguage();

$autoDetectUrl= $params->get("autoDetectUrl","1");
$ownUrl		  = $params->get("url","");
$httpsOrNot	  = $params->get("httpsOrNot","1");
$http 		  = ($httpsOrNot == '1') ? 'http://':'https://';
$appid 		  = null; 

switch($autoDetectUrl){
	case "1" : //Site Url
		$url = JURI::base();
	break;
	case "2": //Page Url
		$uri = & JFactory::getURI();
		$url = $uri->toString();
	break;
	case "3" :
		$url = $ownUrl;
	break;
	default : 
		$url = JURI::base();
	break;
}

$width   	  = $params->get("width","100");
$height   	  = $params->get("height","50");
$colorScheme  = $params->get("colorScheme","light");
$showPictures = $params->get("showPictures","true");
$layout 	  = $params->get("layout","standard");
$action  	  = $params->get("action","like");
$suffix  	  = $params->get("moduleclass_sfx","");
$loadAsWhat	  = $params->get("loadAsWhat","3");
$sendButton	  = $params->get("send","0");
$sendButton	  = ($sendButton == '1') ? 'true' : 'false';
$font		  = $params->get("font","arial");
$loadApi	  = $params->get("loadApi","1");
$copyright	  = $params->get("copyright","1");
$langTag 	  = $params->get("language",false);

//Will load the deafult language tag - for your site
if($langTag == false){
	$langTag 	  = str_replace("-","_",$lang->getTag());
}

//Open graph
$OGtitle	  = $params->get("title","");
$OGtype		  = $params->get("type","");
$OGimage	  = $params->get("image","");
$OGurl 		  = $params->get("ogURL","");
$OGsitename   = $params->get("sitename","");
$OGappid 	  = $params->get("appID","");
$OGdescription= $params->get("OGdescription","");

if($OGtitle):	
	$document->addCustomTag('<meta property="og:title" content="'.$OGtitle.'" />');
endif;	
if($OGtype):
	$document->addCustomTag('<meta property="og:type" content="'.$OGtype.'" />');
endif;	
if($OGurl):	
	$document->addCustomTag('<meta property="og:url" content="'.$OGurl.'" />');
endif;	
if($OGimage):	
	$document->addCustomTag('<meta property="og:image" content="'.JURI::base().$OGimage.'" />');
endif;	
if($OGsitename): 
	$document->addCustomTag('<meta property="og:site_name" content="'.$OGsitename.'" />');
endif;
if($OGdescription): 	
	$document->addCustomTag('<meta property="og:description" content="'.$OGdescription.'" />');
endif;
if($OGappid): 	
	$document->addCustomTag('<meta property="fb:admins" content="'.$OGappid.'" />');
	$appid = "?appId=".$OGappid;
endif;

	$loadApiXFBML = '<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/'.$langTag.'/all.js#xfbml=1'.$appid.'";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>';
	$addScript	  = $document->addCustomTag($loadApiXFBML);


require_once(JModuleHelper::getLayoutPath('mod_facebooklike'));