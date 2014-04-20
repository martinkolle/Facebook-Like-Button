<?php
/**
 * Facebook Like Button for Joomla
 * @package Joomla 1.5
 * @version 1.4
 * @subpackage mod_facebooklike
 * @copyright (C) 2011 KMweb.dk and Martiinkolle.dk
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL v.2
 * @link http://martiinkolle.dk
 **/
 
// no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<div class="VombieLikeButton<?php echo $suffix;?>" style="<?php echo $css; ?>">
<?php

switch($loadAsWhat){
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
<?php
if($removeCopyright == '1'):
?>
<span style="color:grey; font-size:10px; <?php if($copyright == '0') echo "display:none;"; ?>"> 
		<?php echo JText::_('MOD_FACEBOOKLIKE_CREATED_BY'); ?> 
		<a href="http://martiinkolle.dk" title="Facebook Like Button for Joomla 1.5 and 1.7. Do you want a Joomla based website? Which includes Javascript and a great design?">Martiinkolle.dk</a>
</span>
<?php
endif;
?>
