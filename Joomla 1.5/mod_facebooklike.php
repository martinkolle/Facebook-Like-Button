<?php
/**
 * Facebook Like Button for Joomla
 * @package Joomla 1.5
 * @version 1.5
 * @subpackage mod_facebooklike
 * @copyright (C) 2011 KMweb.dk and Martiinkolle.dk
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL v.2
 * @link http://martiinkolle.dk
 **/

// no direct access
defined('_JEXEC') or die('Restricted access');

//Load general things
$document	  = JFactory::getDocument();
$lang		  = JFactory::getLanguage();

$autoDetectUrl= $params->get("autoDetectUrl","1");
$ownUrl		  = $params->get("url","");
$httpsOrNot	  = $params->get("httpsOrNot","1");
$http 		  = ($httpsOrNot == '1') ? 'http://':'https://';

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

$width   	  = $params->get("width","100%");
$height   	  = $params->get("height","");
$colorScheme  = $params->get("colorScheme","light");
$showPictures = $params->get("showPictures","true");
$layout 	  = $params->get("layout","standard");
$action  	  = $params->get("action","like");
$suffix  	  = $params->get("moduleclass_sfx","");
$loadAsWhat	  = $params->get("loadAsWhat","3");
$sendButton	  = $params->get("send","0");
$sendButton   = ($sendButton == '1') ? 'true' : 'false';
$font		  = $params->get("font","arial");
$loadApi	  = $params->get("loadApi","1");
$copyright	  = $params->get("copyright","1");
$css 		  = $params->get("specifict_css","");
$langTag 	  = $params->get("language",null);

//Set this to 1 if you want to remove my name from the source code!
$removeCopyright = $params->get("removeCopyright","0");

//Will load the deafult language tag at your site
if($langTag == null){
$langTag 	  = str_replace("-","_",$lang->getTag());
}

/*
* Open Graph integration
* This have not been annoced to be working, but it have been ported from the J!2.5 version, and is working!
* To get this to work, you may need to install a Plugin "Vombie Facebook Like"
*/
$OGtitle	  = $params->get("title","");
$OGtype		  = $params->get("type","");
$OGimage	  = JURI::base().$params->get("image","");
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
	$document->addCustomTag('<meta property="og:image" content="'.$OGimage.'" />');
endif;	
if($OGsitename): 
	$document->addCustomTag('<meta property="og:sitename" content="'.$OGsitename.'" />');
endif;
if($OGappid): 	
	$document->addCustomTag('<meta property="fb:admins" content="'.$OGappid.'" />');
endif;
if($OGdescription):
	$document->addCustomtag('<meta property="og:description" content="'.$OGdescription.'"/>');
endif;

//Includes the XFBML
	$loadApiXFBML = '
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "'.$http.'connect.facebook.net/'.$langTag.'/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>
	';
	$addScript	  = $document->addCustomTag($loadApiXFBML);

/*Different views*/

//Iframe
$iframeView ='
	<iframe 
		id="facebookLikeButton"
		src="'. $http .'www.facebook.com/plugins/like.php?
		locale='.$langTag.'&amp;
		href='. $url.'&amp;
		send='.$sendButton.'&amp;
		layout='. $layout.'&amp;
		show_faces='.$showPictures.'&amp;
		width='.$width.'&amp;
		height='.$height.'&amp;
		font='.$font.'&amp;
		action='.$action.'>&amp;
		colorscheme='.$colorScheme.'" 
		scrolling="no" 
		frameborder="0" 
		style="border:none; overflow:hidden; width:'.$width.';height:'.$height.';"
		allowTransparency="true">
	</iframe> 
	';

//HTML 5
$HTML5View = '
	<div class="fb-like" 
		data-href="'.$url.'"
		data-send="'.$sendButton.'" 
		data-layout="'.$layout.'"
		data-show-faces="'.$showPictures.'"  
		data-width="'.$width.'" 
		data-action="'.$action.'" 
		data-font="'.$font.'"
		data-colorscheme="'.$colorScheme.'"
	>
	</div>
	';

//XFBML
$XFBMLView = '
	<fb:like 
		href="'.$url.'"
		send="'.$sendButton.'" 
		layout="'.$layout.'"
		show_faces="'.$showPictures.'" 
		width="'.$width.'" 
		font="'.$font.'"
		action="'.$action.'"
		colorscheme="'.$colorScheme.'"
		>
	</fb:like>
	';

require_once(JModuleHelper::getLayoutPath('mod_facebooklike'));