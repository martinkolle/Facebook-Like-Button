<?php
/**
 * Facebook Like Button for Joomla
 * @package Joomla 2.5
 * @version 1.4.2
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
		echo $iframeView;
	break;

	case "2" : //HTML 5
		echo $HTML5View;
		$addScript;
	break;

	case "3" ://XFBML
		echo $XFBMLView;
		$addScript;
	break;

	default :
		JError::raiseNotice( 100, JText::_('MOD_FACEBOOKLIKE_COULD_NOT_DETERMINE_VIEW') );
	break;
}
?>

</div>
