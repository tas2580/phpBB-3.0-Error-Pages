<?php
/**
*
* HTTP Errors [English En]
*
* @package language
* @version $Id: errors.php,v 1.0.0 2009/01/19 16:43:33 tas2580 Exp $
* @copyright (c) 2007 SEO phpBB http://www.phpbb-seo.de
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/


/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'HTTP_ERRORS'			=> 'HTTP Error',
	'HTTP_ERRORS_DESC'		=> 'This list shows all HTTP errors. That can help you find dead links, or attacks on the server.',
	'ERRORTYPE'				=> 'Error type',
	'REFERER'				=> 'Referer',
	'REQUEST_PAGE'			=> 'Request Page',
	'IS_ERROR'				=> 'There is an error occurred',
	'DO_NEXT'				=> 'Go to %1$sForum Index%2$s, or use the %3$sSearch%4$s to find the desired information.',
	'ERROR_401'				=> 'Unauthorized',
	'401_TITLE'				=> 'Error 401 (Unauthorized)',
	'401_DESCRIPTION'		=> 'The request can not be finished without valid authentication.',
	'ERROR_403'				=> 'Forbidden',
	'403_TITLE'				=> 'Error 403 (Forbidden)',
	'403_DESCRIPTION'		=> 'The request was for lack of authorization from the client not be executed.',
	'ERROR_404'				=> 'Page not found',
	'404_TITLE'				=> 'Error 404 (Page not found)',
	'404_DESCRIPTION'		=> 'The page you requested on the server could not be found.',
	'ERROR_500'				=> 'Internal Server Error',
	'500_TITLE'				=> 'Error 500 (Internal Server Error)',
	'500_DESCRIPTION'		=> 'The server run into a generic error.',
	
));

?>
