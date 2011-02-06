<?php

/**
* @package - NV newspage
* @copyright (c) nickvergessen http://www.flying-bits.org/
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* 
* this cut down was originally a part of:
*
* @package - Board3portal
* @version $Id: functions.php $
* @copyright (c) kevin / saint ( www.board3.de/ ), (c) Ice, (c) nickvergessen ( www.flying-bits.org/ ), (c) redbull254 ( www.digitalfotografie-foren.de ), (c) Christian_N ( www.phpbb-projekt.de )
* @based on: phpBB3 Portal by Sevdin Filiz, www.phpbb3portal.com
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

if (!defined('IN_PHPBB'))
{
   exit;
}

/**
* check for invalid link tag at the end of a cut string
*/
function add_endtag ($message = '')
{
	$check = (int) strripos($message, '<!-- m --><a ');
	$check_2 = (int) strripos($message, '</a><!--');
	
	if(((isset($check) && $check > 0) && ($check_2 <= $check)) || ((isset($check) && $check > 0) && !isset($check_2)))
	{
		$message .= '</a><!-- m -->';
	}
	
	return $message;
}

// Don't let them mess up the complete portal layout in cut messages and do some real AP magic
function is_valid_bbtag($str, $bbuid)
{
	return (substr($str,0,1) == '[') && (strpos($str, ':'.$bbuid.']') > 0);
}

function get_end_bbtag($tag, $bbuid)
{
	$etag = '';
	for($i=0;$i<strlen($tag);$i++)
	{
		if ($tag[$i] == '[') 
		{
			$etag .= $tag[$i] . '/';
		}
		else if (($tag[$i] == '=') || ($tag[$i] == ':'))
		{
			if ($tag[1] == '*')
			{
				$etag .= ':m:'.$bbuid.']';
			}
			else if (substr($tag, 0, 6) == '[list=')
			{
				$etag .= ':o:'.$bbuid.']';
			}
			else if (substr($tag, 0, 5) == '[list')
			{
				$etag .= ':u:'.$bbuid.']';
			}
			else 
			{
				$etag .= ':'.$bbuid.']';
			}
			break;
		} 
		else 
		{
			$etag .= $tag[$i];
		}
	}
	return $etag;
}

function get_next_word($str)
{
	$ret = '';
	for($i=0;$i<strlen($str);$i++)
	{
		switch ($str[$i])
		{
			case ' ': //$ret .= ' '; break; break;
				return $ret . ' ';
			case '\\': 
				if ($str[$i+1] == 'n') return $ret . '\n';
			case '[': if ($i != 0) return $ret;
			default: $ret .= $str[$i];
		}    
	}
	return $ret;
}

function get_next_bbhtml_part($str)
{
	$lim =  substr($str,0,strpos($str,'>')+1);
	return substr($str,0,strpos($str, $lim, strlen($lim))+strlen($lim));
}

function get_sub_taged_string($str, $bbuid, $maxlen)
{
	$sl = $str;
	$ret = '';
	$ntext = '';
	$lret = '';
	$i = 0;
	$cnt = $maxlen;
	$last = '';
	$arr = array();

	while((strlen($ntext) < $cnt) && (strlen($sl) > 0))
	{
		$sr = '';
		if (substr($sl, 0, 1) == '[')
		{
			$sr = substr($sl,0,strpos($sl,']')+1);
		}
		/* GESCHLOSSENE HTML-TAGS BEACHTEN */
		if (substr($sl, 0, 2) == '<!')
		{
			$sr = get_next_bbhtml_part($sl);
			$ret .= $sr;
		} 
		else if (substr($sl, 0, 1) == '<')
		{
			$sr = substr($sl,0,strpos($sl,'>')+1);
			$ret .= $sr;
		}
		else if (is_valid_bbtag($sr, $bbuid))
		{
			if ($sr[1] == '/')
			{
				/* entfernt das endtag aus dem tag array */
				$tarr = array();
				$j = 0;
				foreach ($arr as $elem)
				{
					if (strcmp($elem[1],$sr) != 0) 
					{
						$tarr[$j++] = $elem;
					}
				}
				$arr = $tarr;
			}
			else
			{
				$arr[$i][0] = $sr;
				$arr[$i++][1] = get_end_bbtag($sr, $bbuid);
			} 
			$ret .= $sr;
		}
		else
		{
			$sr = get_next_word($sl);
			$ret .= $sr;
			$ntext .= $sr;
			$last = $sr;
		}
		$sl = substr($sl, strlen($sr), strlen($sl)-strlen($sr));
	}
	
	$ap = '';

	foreach ($arr as $elem)
	{
		$ap = $elem[1] . $ap;
	}

	$ret .= $ap;
	$ret = trim($ret);
	if(substr($ret, -4) == '<!--')
	{
		$ret .= ' -->';
	}
	$ret = add_endtag($ret);
	$ret = $ret . '...';
	return $ret;
}

function ap_validate($str)
{
	$s = str_replace('<br />', '<br/>', $str);
	return str_replace('</li><br/>', '</li>', $s);
}
?>