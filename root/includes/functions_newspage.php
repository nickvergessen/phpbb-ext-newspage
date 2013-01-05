<?php
/**
*
* @package - NV newspage
* @copyright (c) nickvergessen http://www.flying-bits.org/
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* Check if the $archive_var is a valid date for timestamp creation
*/
function newspage_check_archive_date($archive_var)
{
	if (preg_match("/[0-1][0-9]_[1-2][0-9]{3}/", $archive_var))
	{
		$archive = explode('_', $archive_var);
		if ( (0 < $archive[0]) && ( 13 > $archive[0]) && (1970 <=  $archive[1]))
		{
			if ((is_int(2147483648)) || (2038 >  $archive[1]))
			{
				return $archive;
			}
		}
	}
	return false;
}
