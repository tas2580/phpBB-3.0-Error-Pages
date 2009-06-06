<?php
/** 
*
* @author Tobi Schaefer http://www.tas2580.de/
*
* @package phpbb
* @version $Id: error_page.php, v 1.0.0 2009/01/19 16:43:33 tas2580 Exp $
* @copyright (c) 2007 SEO phpBB http://www.phpbb-seo.de
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('mods/errors');

$type	= request_var('type', 500);

$sql_ary = array(
	'ip'			=> isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '',
	'type'			=> $type,
	'error_time'	=> time(),
	'referer'		=> isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '',
	'page'			=> isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '',
);
$db->sql_query('INSERT INTO ' . HTTPERRORS_TABLE .' ' . $db->sql_build_array('INSERT', $sql_ary));

switch ($type)
{
	case 401:
		$page_title = $user->lang['401_TITLE'];
		$page_description = $user->lang['401_DESCRIPTION'];
	break;

	case 403:
		$page_title = $user->lang['403_TITLE'];
		$page_description = $user->lang['403_DESCRIPTION'];
	break;
	
	case 404:
		$page_title = $user->lang['404_TITLE'];
		$page_description = $user->lang['404_DESCRIPTION'];
	break;
	
	case 500:
		$page_title = $user->lang['500_TITLE'];
		$page_description = $user->lang['500_DESCRIPTION'];
	break;
}

// Output page
page_header($page_title);

$template->assign_vars(array(
	'GOTO_PAGE'			=> sprintf($user->lang['DO_NEXT'], '<a href="' . append_sid("{$phpbb_root_path}") . '">', '</a>', '<a href="' . append_sid("{$phpbb_root_path}search.$phpEx") . '">', '</a>'),
	'ERROR_TITLE' 		=> $page_title,
	'ERROR_DESCRIPTION' => $page_description,
));

$template->set_filenames(array(
	'body' => 'error_page.html')
);

page_footer();

?>
