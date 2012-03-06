<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filesystem.file');
 
class pkg_FacebookLikeInstallerScript 
{
	function install($parent) 
	{
		$enabled = JPluginHelper::isEnabled('system', 'vombiefacebooklike');

		echo '
<style type="text/css">#facebooklike ol li, #facebooklike p{font-size:14px}</style>
<div style="width:100%" id="facebooklike"> 
<div style="width:45%; float:left;">
<h1 style="color:#136AA5;font-size:25px;">Thanks for installing Facebook Like!</h1>';
	if (!$enabled) : 
		echo '<span style="color:red; padding:7px;margin:7px;">Please enable <a href="index.php?option=com_plugins&view=plugins&filter_search=facebook%20like">Facebook Like Button Plugin</a> if you are going to use "Open Graph". (not optional!)</span>';
	endif;
echo '
	</div>
<div style="width:35%; float:left;">
<a style="margin-top:150px;border: 1px solid #3B6F1B;border-radius: 5px 5px 5px 5px;font-size: 30px;margin-top: 35px;padding: 10px;text-decoration: none;width: 60%;background:#00922D;background: -webkit-gradient(linear, 50% 100%, 50% 0%, from(#00922D), to(#00900D));background: -moz-linear-gradient(90deg, #00922D, #00900D);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#CCCCCC\', endColorstr=\'#F1F1F1\');color:#cccccc !important;" href="index.php?option=com_modules&filter_module=mod_facebooklike">Go to module</a>
<a style="margin-top:180px;border-radius: 5px 5px 5px 5px;font-size: 30px;margin-top: 35px;padding: 10px;text-decoration: none;width: 60%;background: #CCC;
background: -webkit-gradient(linear, 50% 100%, 50% 0%, from(#CCC), to(#F1F1F1));
background: -moz-linear-gradient(90deg, #CCC, #F1F1F1);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#CCCCCC\', endColorstr=\'#F1F1F1\');
color: #00922D !important;" href="http://extensions.joomla.org/extensions/social-web/republish/16585" target="_blank">Vote at JED</a></div></div>';

	//We are removing a file, which not is used from 1.4.3
	$file = JPATH_BASE.DS.'modules'.DS.'mod_facebooklike'.DS.'fields'.DS.'validation.php';
	if (file_exists($file)) {
		JFile::delete($file);
	}
	}
}