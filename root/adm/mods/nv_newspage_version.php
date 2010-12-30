<?php
/**
*
* @package acp
* @version $Id: nv_newspage_version.php 169 2009-07-15 17:42:21Z nickvergessen $
* @copyright (c) nickvergessen ( http://www.flying-bits.org/ )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package nv_altt
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class nv_newspage_version
{
	function version()
	{
		return array(
			'author'	=> 'nickvergessen',
			'title'		=> 'NV Newspage',
			'tag'		=> 'nv_newspage',
			'version'	=> '1.0.3',
			'file'		=> array('www.flying-bits.org', 'updatecheck', 'nv_newspage.xml'),
		);
	}
}

?>