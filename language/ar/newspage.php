<?php

/**
 * This file is part of the NV Newspage Extension package.
 *
 * @copyright (c) nickvergessen <https://github.com/nickvergessen>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * For full copyright and license information, please see
 * the license.txt file.
 *
 * Translated By : Bassel Taha Alhitary - www.alhitary.net
 */

if (!defined('IN_PHPBB'))
{
	exit;
}
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'NEWS'						=> 'أحدث المواضيع',
	'NEWS_ADD_NEW'				=> 'جديد',
	'NEWS_ADD_NEW_TITLE'		=> 'إضافة موضوع جديد',
	'NEWS_ARCHIVE_SHOW'			=> 'السماح بالترتيب بواسطة التاريخ',
	'NEWS_ARCHIVE'				=> 'الأرشيف',
	'NEWS_ARCHIVE_OF'			=> 'الأرشيف %s',
	'NEWS_ATTACH_SHOW'			=> 'عرض المرفقات',
	'NEWS_ATTACH_SHOW_EXPLAIN'	=> 'سيتم دائماً عرض المرفقات التي بداخل الموضوع.',
	'NEWS_CAT'					=> 'الأقسام',
	'NEWS_CAT_SHOW'				=> 'السماح بالترتيب بواسطة المنتديات',
	'NEWS_CHAR_LIMIT'			=> 'إختصار نص الموضوع ',
	'NEWS_COMMENTS'				=> 'الردود ',
	'NEWS_FILTER_ARCHIVE'		=> 'ترتيب التاريخ',
	'NEWS_FILTER_BY_ARCHIVE'	=> 'الترتيب بواسطة التاريخ',
	'NEWS_FILTER_BY_CATEGORY'	=> 'الترتيب بواسطة المنتديات',
	'NEWS_FILTER_CATEGORY'		=> 'ترتيب المنتدى',
	'NEWS_FILTER_REMOVE'		=> 'حذف الترتيب',
	'NEWS_FORUMS'				=> 'تحديد منتديات المواضيع',
	'NEWS_GO_TO_TOPIC'			=> 'رابط الموضوع ',
	'NEWS_NUMBER'				=> 'عدد المواضيع بكل صفحة ',
	'NEWS_PAGES'				=> 'عدد الصفحات ',
	'NEWS_POLL'					=> 'تصويت ',
	'NEWS_POLL_GOTO'			=> 'أنقر هنا للتصويت !',
	'NEWS_POST_BUTTONS'			=> 'إظهار أيقونات المشاركة',
	'NEWS_POST_BUTTONS_EXPLAIN'	=> 'إقتباس , تعديل , الخ.',
	'NEWS_READ_FULL'			=> 'قراءة الموضوع كاملاً',
	'NEWS_READ_HERE'			=> 'هنا',
	'NEWS_SAVED'				=> 'تم حفظ الإعدادات بنجاح.',
	'NEWS_SHADOW_SHOW'			=> 'إظهار المواضيع المنقولة',
	'NEWS_USER_INFO'			=> 'إظهار معلومات العضو',
	'NEWS_USER_INFO_EXPLAIN'	=> 'الصورة الشخصية , حقول الملف الشخصي , الخ.',

	'NO_NEWS'					=> 'لا توجد مواضيع.',
	'NO_NEWS_ARCHIVE'			=> 'لا توجد مواضيع في هذا الأرشيف.',
	'NO_NEWS_CATEGORY'			=> 'لا توجد مواضيع في هذا القسم.',

	'NEWSPAGE'					=> 'المواضيع',

	'VIEW_NEWS_POSTS'			=> array(
		0	=> 'لا توجد مواضيع',
		1	=> '1 موضوع',
		2	=> '%d مواضيع',
	),

	'VIEWONLINE_NEWS'			=> 'يُشاهد المواضيع',
	'VIEWONLINE_NEWS_ARCHIVE'	=> 'يُشاهد مواضيع %s',
	'VIEWONLINE_NEWS_CATEGORY'	=> 'يُشاهد المواضيع في %s',
	'VIEWONLINE_NEWS_CATEGORY_ARCHIVE'	=> 'يُشاهد المواضيع في %s لـ %s',
));
