<?php class tpl_login {

function login(&$q,$res) { $s="";
	if ($res) {
		$str="Возможно, Вы неправильно ввели логин или пароль";
	}
	$s.='<div id="form-login">';
	$s.=	'<div id="form-caption">';
	$s.=		'Авторизация';
	$s.=	'</div>';
	if (isset($str)) {
		$s.='<div class="form-error">';
		$s.=$str;
		$s.='</div>';
	}
	$s.=	'<div id="form-table">';
	$s.=	'<form action="index.php" method="POST">';
	$s.=		'<input name="action" value="login" type="hidden">';
	$s.=		'<table align="center" cellpadding="2" cellspacing="1" border="0">';
	$s.=			'<tr valign="top">';
	$s.=				'<td>';
	$s.=				'<div class="form-field">';
	$s.=					'Логин:';
	$s.=				'</div>';
	$s.=				'</td>';
	$s.=				'<td>';
	$s.=				'<div class="form-input">';
	$s.=					'<input name="login" type="text" size="20" maxlength="20" selected>';
	$s.=				'</div>';
	$s.=				'</td>';
	$s.=			'</tr>';
	$s.=			'<tr valign="top">';
	$s.=				'<td>';
	$s.=				'<div class="form-field">';
	$s.=					'Пароль:';
	$s.=				'</div>';
	$s.=				'</td>';
	$s.=				'<td>';
	$s.=				'<div class="form-input">';
	$s.=					'<input name="password" type="text" size="20" maxlength="20">';
	$s.=				'</div>';
	$s.=				'</td>';
	$s.=			'</tr>';
	$s.=			'<tr valign="top">';
	$s.=				'<td align="center" colspan="2">';
	$s.=					'<div id="form-footer">';
	$s.=						'<input type="submit" value="Войти">';
	$s.=					'</div>';
	$s.=				'</td>';
	$s.=			'</tr>';
	$s.=		'</table>';
	$s.=	'</div>';
	$s.=	'</form>';
	$s.='</div>';
	return $s;
}

} ?>
