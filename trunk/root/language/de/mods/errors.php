<?php
/**
*
* HTTP Errors [Deutsch Du]
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
	'HTTP_ERRORS'			=> 'HTTP Fehler',
	'HTTP_ERRORS_DESC'		=> 'Diese Liste zeigt alle HTTP-Fehler die durch Beutzer verursacht wurden aufgelistet. Das kann dir helfen tote Links zu finden, oder Angriffe auf den Server zu erkennen.',
	'ERRORTYPE'				=> 'Fehlertyp',
	'REFERER'				=> 'Referer',
	'REQUEST_PAGE'			=> 'Angeforderte Seite',
	'IS_ERROR'				=> 'Es ist ein Fehler aufgetreten',
	'DO_NEXT'				=> 'Gehe zur %1$sHomepage%2$s, oder benutze die %3$sSuchfunktion%4$s um die gewünschte Information zu finden.',
	'ERROR_401'				=> 'Unauthorized',
	'401_TITLE'				=> 'Fehler 401 (Unauthorized)',
	'401_DESCRIPTION'		=> 'Die Anfrage kann nicht ohne gültige Authentifizierung durchgeführt werden.',
	'ERROR_403'				=> 'Forbidden',
	'403_TITLE'				=> 'Fehler 403 (Forbidden)',
	'403_DESCRIPTION'		=> 'Die Anfrage wurde mangels Berechtigung des Clients nicht durchgeführt.',
	'ERROR_404'				=> 'Seite nicht gefunden',
	'404_TITLE'				=> 'Fehler 404 (Seite nicht gefunden)',
	'404_DESCRIPTION'		=> 'Die von dir angeforderte Seite konnte auf dem Server leider nicht gefunden werden. Dafür kann es mehrere Gründe geben:</p><p>&nbsp;* Die Datei wurde umbenannt oder gelöscht.</p><p>&nbsp;* Du bist über einen Link gekommen der falsch verlinkt hat.</p><p>&nbsp;* Du hast die URL falsch eingegeben.',
	'ERROR_500'				=> 'Internal Server Error',
	'500_TITLE'				=> 'Fehler 500 (Internal Server Error)',
	'500_DESCRIPTION'		=> 'Dem Server ist ein allgemeiner Fehler unterlaufen.',
	
));

?>
