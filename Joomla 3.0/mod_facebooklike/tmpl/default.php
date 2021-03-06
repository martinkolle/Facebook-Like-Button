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
defined('_JEXEC') or die; ?>

<div class="VombieLikeButton<?php echo $suffix;?>">
<?php

switch($loadAsWhat) {
	case "1" : //Iframe
		echo '
	<iframe 
		id="facebookLikeButton"
		src="'. $http .'www.facebook.com/plugins/like.php?
		locale='.$langTag.'&amp;
		href='. $url.'&amp;
		send='.$sendButton.'&amp;
		layout='. $layout.'&amp;
		show_faces='.$showPictures.'&amp;
		width='.preg_replace("/[^0-9]/","",$width).'&amp;
		height='.preg_replace("/[^0-9]/","",$height).'&amp;
		font='.$font.'&amp;
		action='.$action.'&amp;
		colorscheme='.$colorScheme.'&amp;
		appId='.$OGappid.'" 
		scrolling="no" 
		frameborder="0" 
		style="border:none; overflow:hidden;"
		allowTransparency="true">
	</iframe> 
	';
	break;

	case "2" : //HTML 5
		echo '
	<div class="fb-like" 
		data-href="'.$url.'"
		data-send="'.$sendButton.'" 
		data-layout="'.$layout.'"
		data-show-faces="'.$showPictures.'"  
		data-width="'.preg_replace("/[^0-9]/","",$width).'" 
		data-action="'.$action.'" 
		data-font="'.$font.'"
		data-colorscheme="'.$colorScheme.'"
	>
	</div>
	';
		$document->addCustomTag($loadApiXFBML);
	break;

	case "3" ://XFBML
		echo '
	<fb:like 
		href="'.$url.'"
		send="'.$sendButton.'" 
		layout="'.$layout.'"
		show-faces="'.$showPictures.'"  
		width="'.preg_replace("/[^0-9]/","",$width).'" 
		action="'.$action.'" 
		font="'.$font.'"
		colorscheme="'.$colorScheme.'"
	>
	</fb:like>
	';
		$document->addCustomTag($loadApiXFBML);
	break;

	default :
		JError::raiseNotice( 100, JText::_('MOD_FACEBOOKLIKE_COULD_NOT_DETERMINE_VIEW') );
	break;
}
?>

</div>