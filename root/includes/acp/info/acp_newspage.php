<?php

/**
*
* @package - NV newspage
* @version $Id: acp_newspage.php 169 2009-07-15 17:42:21Z nickvergessen $
* @copyright (c) nickvergessen ( http://www.flying-bits.org/ )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @package module_install
*/
class acp_newspage_info
{
	function module()
	{		
		return array(
			'filename'	=> 'acp_newspage',
			'title'		=> 'NEWS',
			'version'	=> '1.0.2',
			'modes'		=> array(
				'adjust_news'	=> array(
					'title'		=> 'NEWS_CONFIG',
					'auth'		=> 'acl_a_board',
					'cat'		=> array('ACP_BOARD_CONFIGURATION'),
				),
			),
		);
	}
}

?>