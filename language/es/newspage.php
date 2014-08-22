<?php

/**
*
* newspage [Spanish]
*
* @package language
* @version $Id$
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
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
	'NEWS'						=> 'Noticias',
	'NEWS_ADD_NEW'				=> 'New',
	'NEWS_ADD_NEW_TITLE'		=> 'Añadir nueva noticia',
	'NEWS_ARCHIVE_SHOW'			=> 'Permitir filtrar por fecha',
	'NEWS_ARCHIVE'				=> 'Archivo',
	'NEWS_ARCHIVE_OF'			=> 'Archivo %s',
	'NEWS_ATTACH_SHOW'			=> 'Mostrar adjuntos',
	'NEWS_ATTACH_SHOW_EXPLAIN'	=> 'Siempre se mostrarán los archivos adjuntos en línea.',
	'NEWS_CAT'					=> 'Categorías',
	'NEWS_CAT_SHOW'				=> 'Allow to filter by forums',
	'NEWS_CHAR_LIMIT'			=> 'Reducir texto de noticias',
	'NEWS_COMMENTS'				=> 'Comentarios',
	'NEWS_FILTER_ARCHIVE'		=> 'Filtrar fecha',
	'NEWS_FILTER_BY_ARCHIVE'	=> 'Filtrar noticias por fecha',
	'NEWS_FILTER_BY_CATEGORY'	=> 'Filtrar noticias por foro',
	'NEWS_FILTER_CATEGORY'		=> 'Filtrar foro',
	'NEWS_FILTER_REMOVE'		=> 'Eliminar filtro',
	'NEWS_FORUMS'				=> 'Seleccionar foros de noticias',
	'NEWS_GO_TO_TOPIC'			=> 'Enlace al tema',
	'NEWS_NUMBER'				=> 'Noticias por página',
	'NEWS_PAGES'				=> 'Número de páginas',
	'NEWS_POLL'					=> 'Encuesta',
	'NEWS_POLL_GOTO'			=> '¡Clic aquí para votar!',
	'NEWS_POST_BUTTONS'			=> 'Mostrar botones relativos al mensaje',
	'NEWS_POST_BUTTONS_EXPLAIN'	=> 'Citar, editar, etc.',
	'NEWS_READ_FULL'			=> 'Leer noticia completa',
	'NEWS_READ_HERE'			=> 'Aquí',
	'NEWS_SAVED'				=> 'Los ajustes han sido guardados correctamente.',
	'NEWS_SHADOW_SHOW'			=> 'Show moved topics',
	'NEWS_USER_INFO'			=> 'Mostrar información del usuario',
	'NEWS_USER_INFO_EXPLAIN'	=> 'Avatar, campos del perfil, etc.',

	'NO_NEWS'					=> 'No hay noticias.',
	'NO_NEWS_ARCHIVE'			=> 'No hay noticias en este archivo.',
	'NO_NEWS_CATEGORY'			=> 'No hay noticias en esta categoría.',

	'NEWSPAGE'					=> 'Noticias',

	'VIEW_NEWS_POSTS'			=> array(
		0	=> 'No hay noticias',
		1	=> '1 noticia',
		2	=> '%d noticias',
	),

	'VIEWONLINE_NEWS'			=> 'Viendo noticias',
	'VIEWONLINE_NEWS_ARCHIVE'	=> 'Viendo noticias de %s',
	'VIEWONLINE_NEWS_CATEGORY'	=> 'Viendo noticias en %s',
	'VIEWONLINE_NEWS_CATEGORY_ARCHIVE'	=> 'Viendo noticias en %s de %s',
));
