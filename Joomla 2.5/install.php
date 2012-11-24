<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filesystem.file');
 
class pkg_FacebookLikeInstallerScript 
{
	function install($parent) 
	{
		echo '
<style type="text/css">#facebooklike ol li, #facebooklike p{font-size:14px}.adminform th{display:none !important;}</style>
<h1 style="color:#136AA5;font-size:25px;">Thanks for installing Facebook Like!</h1>';
	}
}