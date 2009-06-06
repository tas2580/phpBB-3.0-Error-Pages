<?php
/** 
*
* @author Tobi Schaefer http://www.tas2580.de/
*
* @package acp
* @version $Id: acp_errors.php,v 1.0.0 2009/01/19 17:22:14 tas2580 Exp $
* @copyright (c) SEO phpBB http://www.phpbb-seo.de
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* @package acp
*/
class acp_errors
{
	function main($id, $mode)
	{
		global $db, $user, $config, $template;

		$user->add_lang('mods/errors');
		$this->tpl_name = 'acp_errors';
		$this->page_title = $user->lang['HTTP_ERRORS'];
	
		// Set up general vars
		$action		= request_var('action', '');
		$deletemark = (!empty($_POST['delmarked'])) ? true : false;
		$deleteall	= (!empty($_POST['delall'])) ? true : false;
		$marked		= request_var('mark', array(0));

		// Delete entries if requested and able
		if ($deletemark || $deleteall)
		{
			if (confirm_box(true))
			{
				$where_sql = '';
				if ($deletemark && sizeof($marked))
				{
					$sql_in = array();
					foreach ($marked as $mark)
					{
						$sql_in[] = $mark;
					}
					$where_sql = ' WHERE ' . $db->sql_in_set('error_id', $sql_in);
					unset($sql_in);
				}

				if ($where_sql || $deleteall)
				{
					$sql = 'DELETE FROM ' . HTTPERRORS_TABLE . "
						$where_sql";
					$db->sql_query($sql);
				}
			}
			else
			{
				confirm_box(false, $user->lang['CONFIRM_OPERATION'], build_hidden_fields(array(
					'delmarked'	=> $deletemark,
					'delall'	=> $deleteall,
					'mark'		=> $marked,
					'mode'		=> $mode,
					'action'	=> $action))
				);
			}
		}

		// List all Errors in the System
		$order	= request_var('order', 'error_time');
		$start	= request_var('start', 0);
		// Sort keys
		$sort_days	= request_var('st', 0);
		$sort_key	= request_var('sk', 't');
		$sort_dir	= request_var('sd', 'd');

		// Sorting
		$limit_days = array(
			0	=> $user->lang['ALL_ENTRIES'],
			1	=> $user->lang['1_DAY'],
			7	=> $user->lang['7_DAYS'],
			14	=> $user->lang['2_WEEKS'],
			30	=> $user->lang['1_MONTH'],
			90	=> $user->lang['3_MONTHS'],
			180	=> $user->lang['6_MONTHS'],
			365	=> $user->lang['1_YEAR']
		);
		$sort_by_text = array(
			'i'	=> $user->lang['IP'],
			'e'	=> $user->lang['ERRORTYPE'],
			't'	=> $user->lang['TIME'],
			'r'	=> $user->lang['REFERER'],
			'p'	=> $user->lang['REQUEST_PAGE']
		);
		$sort_by_sql = array(
			'i'	=> 'ip',
			'e'	=> 'type',
			't'	=> 'error_time',
			'r'	=> 'referer',
			'p'	=> 'page'
		);

		$s_limit_days = $s_sort_key = $s_sort_dir = $u_sort_param = '';
		gen_sort_selects($limit_days, $sort_by_text, $sort_days, $sort_key, $sort_dir, $s_limit_days, $s_sort_key, $s_sort_dir, $u_sort_param);

		// Define where and sort sql for use in displaying logs
		$sql_where = ($sort_days) ? (time() - ($sort_days * 86400)) : 0;
		$sql_sort = $sort_by_sql[$sort_key] . ' ' . (($sort_dir == 'd') ? 'DESC' : 'ASC');
		$sql_where = ' WHERE error_time > ' . $sql_where;

		$sql = 'SELECT COUNT(error_id) AS total_errors
			FROM ' . HTTPERRORS_TABLE .
			$sql_where;
		$result = $db->sql_query($sql);
		$total_errors = (int) $db->sql_fetchfield('total_errors');
		$db->sql_freeresult($result);

		$sql = 'SELECT * 
			FROM ' . HTTPERRORS_TABLE .
			$sql_where . '
			ORDER BY ' . $sql_sort;
		$result = $db->sql_query_limit($sql, $config['topics_per_page'], $start);
		while ($row = $db->sql_fetchrow($result))
		{
			$error_type = $row['type'] . ' (' . $user->lang['ERROR_' . $row['type']] . ')';
			$template->assign_block_vars('error_row', array(
				'ID' 		=> $row['error_id'],
				'IP' 		=> $row['ip'],
				'HOST'		=> gethostbyaddr($row['ip']),
				'TYPE'  	=> $error_type,
				'TIME'  	=> $user->format_date($row['error_time']),
				'REFERER'	=> str_replace('&', '&amp;', $row['referer']),
				'PAGE'		=> str_replace('&', '&amp;', $row['page'])
			));
		}
		$db->sql_freeresult($result);

		$template->assign_vars(array(
			'S_LIMIT_DAYS'	=> $s_limit_days,
			'S_SORT_KEY'	=> $s_sort_key,
			'S_SORT_DIR'	=> $s_sort_dir,
			'S_ON_PAGE'		=> on_page($total_errors, $config['topics_per_page'], $start),
			'PAGINATION'	=> generate_pagination($this->u_action . "&amp;$u_sort_param", $total_errors, $config['topics_per_page'], $start, true),
			'PAGE_NUMBER'	=> on_page($total_errors, $config['topics_per_page'], $start),	
			'U_ACTION' 		=> $this->u_action
		));
	}
}

?>
