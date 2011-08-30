<?php
/**
 * UCenter Application Development Example
 *
 * Private Messages Example code
 */

$timeoffset = 8;
$ppp = 10;

$phpself = $_SERVER['PHP_SELF'].'?example=pmlist';
$action = !empty($_GET['action']) ? $_GET['action'] : '';

$output = "
	<a href=\"$phpself\">Short Message</a>
	<a href=\"$phpself&filter=newpm\">Unread messages</a>
	<a href=\"$phpself&filter=announcepm\">Public information</a>
	<a href=\"$phpself&action=send\">Send PM</a>
	<a href=\"$phpself&action=viewblackls\">Blacklist</a>
	<hr>
".print_r($newdata, 1);

switch($action) {
	case '':
		$_GET['page'] =  max(1, intval($_GET['page']));
		
		$_GET['folder'] = !empty($_GET['folder']) ? $_GET['folder'] : 'inbox';
		$_GET['filter'] = !empty($_GET['filter']) ? $_GET['filter'] : '';
		
		$data = uc_pm_list($Example_uid, $_GET['page'], $ppp, $_GET['folder'], $_GET['filter'], 100);

		foreach($data['data'] as $pm) {
			if($_GET['filter'] != 'announcepm') {
				$output .= "<li>[$pm[msgfrom]]<a href=\"$phpself&action=view&touid=$pm[touid]\">$pm[subject] (".gmdate('Y-m-d H:i:s', $pm['dateline'] + $timeoffset * 3600).")</a>";
				$pm['new'] && $output .= " New! ";
				$output .= "<br />$pm[message]";
			} else {
				$output .= "<li><a href=\"$phpself&action=view&pmid=$pm[pmid]\">$pm[subject]</a>";
			}			
		}
		break;
	case 'view':
		$pmid = !empty($_GET['pmid']) ? $_GET['pmid'] : '';
		$data = uc_pm_view($Example_uid, $pmid, $_GET['touid']);
		
		foreach($data as $pm) {
			$output .= "<b>$pm[msgfrom] (".gmdate('Y-m-d H:i:s', $pm['dateline'] + $timeoffset * 3600)."):</b>";
			if($_GET['touid'] == $pm['msgfromid']) {
				$output .= "<a href=\"$phpself&action=addblackls&user=$pm[msgfrom]\">[Ad to blacklist]</a>";
			}
			$output .= "<br>$pm[message]<br><br>";
		}
		
		if(empty($_GET['pmid'])) {
			$output .= "
				<a href=\"$phpself&action=delete&uid=$_GET[touid]\">Delete</a>
				<form method=\"post\" action=\"$phpself&action=send\">
				<input name=\"touid\" type=\"hidden\" value=\"$_GET[touid]\">
				<input name=\"subject\" value=\"\"><br>
				<textarea name=\"message\" cols=\"30\" rows=\"5\"></textarea>
				<input type=\"submit\">
				</form>
				";
		}
		break;
	case 'delete':
		if(uc_pm_deleteuser($Example_uid, array($_GET['uid']))) {
			$output .= "PM has been deleted.";
		}
		break;
	case 'addblackls':
		$user = !empty($_GET['user']) ? $_GET['user'] : (!empty($_POST['user']) ? $_POST['user'] : '');
		if(uc_pm_blackls_add($Example_uid, $user)) {
			$output .= $_GET['user']." added to blacklist.";
		}
		break;
	case 'deleteblackls':
		if(uc_pm_blackls_delete($Example_uid, $_GET['user'])) {
			$output .= $_GET['user']." Removed from the blacklist.";
		}
		break;
	case 'viewblackls':
		$data = explode(',', uc_pm_blackls_get($Example_uid));
		foreach($data as $ls) {
			$ls && $output .= "$ls <a href=\"$phpself&action=deleteblackls&user=$ls\">[Remove]</a>";
		}
		$output .= "
			<form method=\"post\" action=\"$phpself&action=addblackls\">
			<input name=\"user\" value=\"\">
			<input type=\"submit\">
			</form>
			";
		break;
	case 'send':
		if(!empty($_POST)) {
			if(!empty($_POST['touser'])) {
				$msgto = $_POST['touser'];
				$isusername = 1;
			} else {
				$msgto = $_POST['touid'];
				$isusername = 0;
			}
			if(uc_pm_send($Example_uid, $msgto, $_POST['subject'], $_POST['message'], 1, 0, $isusername)) {
				$output .= "PM sent.";
			} else {
				$output .= "PM sending failed, <a href=\"###\" onclick=\"history.back()\">Return</a>";
			}
		} else {
			$output .= "
				<form method=\"post\" action=\"$phpself&action=send\">
				Send to: <input name=\"touser\" value=\"\"><br>
				Title: <input name=\"subject\" value=\"\"><br>
				Content: <textarea name=\"message\" cols=\"30\" rows=\"5\"></textarea>
				<input type=\"submit\">
				</form>
				";
		}
		break;
}

echo $output;
