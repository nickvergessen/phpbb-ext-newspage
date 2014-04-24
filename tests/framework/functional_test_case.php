<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace nickvergessen\newspage\tests\framework;

abstract class functional_test_case extends \phpbb_functional_test_case
{
	static protected $extension_fullname = 'nickvergessen/newspage';

	public function setUp()
	{
		parent::setUp();

		$db = $this->get_db();

		$sql = 'SELECT ext_active
			FROM ' . EXT_TABLE . "
			WHERE ext_name = '" . $db->sql_escape(self::$extension_fullname). "'";
		$result = $db->sql_query($sql);
		$status = (bool) $db->sql_fetchfield('ext_active');
		$db->sql_freeresult($result);

		if (!$status)
		{
			$this->install_ext();
		}
	}

	public function install_ext()
	{
		$this->login();
		$this->admin_login();

		$ext_path = str_replace('/', '%2F', self::$extension_fullname);

		$crawler = self::request('GET', 'adm/index.php?i=acp_extensions&mode=main&action=enable_pre&ext_name=' . $ext_path . '&sid=' . $this->sid);
		$this->assertGreaterThan(0, $crawler->filter('div.errorbox')->count());

		$form = $crawler->selectButton('Enable')->form();
		$crawler = self::submit($form);
		$this->assertGreaterThan(0, $crawler->filter('div.successbox')->count());

		$this->logout();
	}

	protected function add_lang_ext($ext_name, $lang_file)
	{
		if (is_array($lang_file))
		{
			foreach ($lang_file as $file)
			{
				$this->add_lang_ext($ext_name, $file);
			}

			return;
		}

		$lang_path = __DIR__ . "/../../../../{$ext_name}/language/en/$lang_file.php";

		$lang = array();

		if (file_exists($lang_path))
		{
			include($lang_path);
		}

		$this->lang = array_merge($this->lang, $lang);
	}
}
