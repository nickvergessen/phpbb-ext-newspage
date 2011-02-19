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
* Trims a bbcode text to a given length.
*/

class bbcode_trim_message
{
	private $message			= '';
	private $trimmed_message	= '';
	private $bbcode_uid			= '';
	private $append_str			= '';
	private $length				= 0;
	private $length_tolerance	= 0;
	private $is_trimmed			= null;

	public function __construct($message, $bbcode_uid, $length, $append_str = '...', $tolerance = 25)
	{
		$this->message			= $message;
		$this->bbcode_uid		= $bbcode_uid;
		$this->append_str		= $append_str;
		$this->length			= (int) $length;
		$this->length_tolerance	= (int) $tolerance;
	}

	/**
	* Did we trim the message, or was it short enough?
	*/
	public function is_trimmed()
	{
		return (bool) $this->is_trimmed;
	}

	public function message()
	{
		if (is_null($this->is_trimmed))
		{
			$this->is_trimmed = $this->trim();
		}

		return ($this->is_trimmed) ? $this->trimmed_message : $this->message;
	}

	private function trim()
	{
		if (utf8_strlen($this->message) < ($this->length + $this->length_tolerance))
		{
			return false;
		}

		$this->is_trimmed = true;

		if (!$this->bbcode_uid)
		{
			$this->trimmed_message = utf8_substr($this->message, 0, $this->length) . $this->append_str;
			return true;
		}

		$this->trim_action();
		return true;
	}

	/**
	* Helping variables
	*/
	private $open_bbcodes = array();

	private function trim_action()
	{
		/**
		* Step 1:	copy original message
		* Step 2:	utf8_substr() to requested length
		* Step 3:	get a list of all BBCodes that are still open
		* Step 4:	remove links/emails/smilies that are cut, somewhere in the middle
		* Step 5:	close the open BBCodes
		*/
		$this->trimmed_message = $this->message;
		$this->trimmed_message = utf8_substr($this->message, 0, $this->length);

		$last_part = $this->get_open_bbcodes($this->trimmed_message);

		$this->remove_broken_links($this->trimmed_message, $last_part);
		$this->close_bbcodes($this->trimmed_message);
	}

	private function get_open_bbcodes($message)
	{
		$possible_bbcodes = explode('[', $message);
		// Skip the first one.
		array_shift($possible_bbcodes);
		$num_possible_bbcodes	= sizeof($possible_bbcodes);
		$num_tested_bbcodes		= 0;
		$start_of_last_part		= 0;
		foreach ($possible_bbcodes as $part)
		{
			$num_tested_bbcodes++;
			$exploded_parts = explode(':' . $this->bbcode_uid . ']', $part);
			/**
			* There should only be 1 or 2, as bbcode_uid is not supposed to be contained in the message...
			*/
			$num_parts = sizeof($exploded_parts);
			if ($num_parts == 2)
			{
				// We matched it something ;)
				if ($exploded_parts[0][0] != '/')
				{
					$bbcode_tag = $exploded_parts[0];
					// Open BBCode-tag
					if (($equals = utf8_strpos($bbcode_tag, '=')) !== false)
					{
						$bbcode_tag = utf8_substr($bbcode_tag, 0, $equals);
					}
					array_unshift($this->open_bbcodes, $bbcode_tag);
				}
				else
				{
					// Close BBCode-tag
					$bbcode_tag = utf8_substr($exploded_parts[0], 1);
					if (isset($this->open_bbcodes[0]) && ($bbcode_tag == $this->open_bbcodes[0]))
					{
						array_shift($this->open_bbcodes);
					}
				}
			}

			if (($num_tested_bbcodes == $num_possible_bbcodes) && ($num_parts <= 2))
			{
				// This here is the last message part, so we need to check for smilies and links without URL-BBCode
				$start_of_last_part = strrpos($message, array_pop($exploded_parts));
			}
		}

		return $start_of_last_part;
	}

	private function remove_broken_links(&$message, $last_part = 0)
	{
		// This here is the last message part, so we need to check for smilies and links without URL-BBCode
		$open_link = substr_count($message, '<!-- ', $last_part);
		if (!(($open_link % 2) == 0))
		{
			// We did not close all links we opened, so we cut off the message before the last open tag ;)
			$message = utf8_substr($message, 0, utf8_strrpos($message, '<!-- '));
			return;
		}

		$open_brakets = substr_count($message, '<', $last_part);
		$closing_brakets = substr_count($message, '>', $last_part);
		if ($open_brakets != $closing_brakets)
		{
			// There was an open braket for an unparsed link
			$message = utf8_substr($message, 0, utf8_strrpos($message, '<'));
		}
	}

	private function close_bbcodes(&$message)
	{
		while (!empty($this->open_bbcodes))
		{
			$bbcode_tag = array_shift($this->open_bbcodes);
			$message .= '[/' . $bbcode_tag . ':' . $this->bbcode_uid . ']';
		}
	}
}
