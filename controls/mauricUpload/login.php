<?php class login {

function engine(&$q) { $login=false;
	if ($q->url->action=="exit") {
		unset($_SESSION['mauric_upload_login']);		
	}
	if (isset($_SESSION['mauric_upload_login'])) {
		if ($_SESSION['mauric_upload_login']=="TRUE") {
			$login=true;
		}
	}
	if (!$login) {
		$login=$this->loginUser($q);
	}
	if ($login) {
		$_SESSION['mauric_upload_login']="TRUE";
	}
	if (!$login) {
		$q->fn->toModel($q,$this->showLogin($q),"content");
	}
	return $login;
}

function showLogin(&$q) { $s=""; $attempt=false;
	if ($q->url->action=="login") { $attempt=true; }	
	$s.=$q->tpl_login->login($q,$attempt);
	return $s;
}

function loginUser(&$q) { $enter=false;
	if ($q->url->action=="login") {
		if ((isset($_REQUEST['login'])) && (isset($_REQUEST['password']))) {
			$login=trim($_REQUEST['login']);
			$password=md5(trim($_REQUEST['password']));
			if (($login==$q->user_login) && ($password==$q->user_password)) {
				$enter=true;
			}
		}
	}
	return $enter;
}

} ?>
