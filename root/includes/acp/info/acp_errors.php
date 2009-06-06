<?php
/** 
*
* @author Tobi Schaefer http://www.tas2580.de/
*
* @package acp
* @version $Id: acp_errors.php, v 1.0.0 2009/01/19 16:43:33 tas2580 Exp $
* @copyright (c) 2007 SEO phpBB http://www.phpbb-seo.de
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @package module_install
*/

class acp_errors_info
{
	function module()
	{		
		return array(
			'filename'	=> 'acp_errors',
			'title'		=> 'HTTP_ERRORS',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'show'	=> array(
				'title'		=> 'HTTP_ERRORS',
				'auth'		=> 'acl_a_board',
				'cat'		=> array('ACP_BOARD_CONFIGURATION'),
				),
			),
		);
	}

	function install()
	{
	}

	function uninstall()
	{
	}
	
	function update()
	{
	}
}

?>
