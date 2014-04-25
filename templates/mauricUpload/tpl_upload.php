<?php class tpl_upload {

function upload($q) { $s=""; $u=$q->url;
	$s.='<div id="form-login">';
	$s.=	'<div id="form-header">';
	$s.=		'<div id="form-caption">';
	$s.=			'Загруженные файлы';
	$s.=		'</div>';
	$s.=	'</div>';
	$s.=	'<div id="form-table">';
	$s.=	'<form enctype="multipart/form-data" action="index.php" method=POST>';
	$s.=		'<table cellpadding="3" cellspacing="0" border="0">';
	$s.=			'<tr>';
	$s.=				'<td align="center">';
	$s.=					'<input name="MAX_FILE_SIZE" value="1000000000" type="hidden">';
	$s.=					'<input name="action" value="upload" type="hidden">';
	$s.=					'<input name="file_id" value="'.$u->id.'" type="hidden">';
	$s.=					'<input name="caption" class="upload-input-caption" value="'.$u->caption.'" type="text">';
	$s.=				'</td>';
	$s.=			'</tr>';
	$s.=			'<tr>';
	$s.=				'<td align="center">';
	$s.=					'<input name="userfile" type="file">';
	$s.=				'</td>';
	$s.=			'</tr>';
	$s.=			'<tr>';
	$s.=				'<td align="center">';
	$s.=					'<div id="form-footer">';
	$s.=						'<input class="link-blue upload-link-submit" type="submit" value="Загрузить">';
	$s.=					'</div>';
	$s.=				'</td>';
	$s.=			'</tr>';
	$s.=			'<tr>';
	$s.=				'<td align="center">';
	$s.=					'<div class="return-back">';
	$s.=						'<a href="index.php" class="link-simple-blue">Вернуться к списку файлов</a>';
	$s.=					'</div>';
	$s.=				'</td>';
	$s.=			'</tr>';
	$s.=		'</table>';
	$s.=	'</form>';
	$s.=	'</div>';
	$s.='</div>';
	return $s;
}

function res($q,$res) { $s="";
	$s.='<div id="form-files">';
	if ($res) {
		$s.='<div class="show-to-center form-success">';
		$s.="Файл успешно загружен";
	} else {
		$s.='<div class="show-to-center form-notice">';
		$s.="Произошла ошибка при загрузке файла";
	}
	$s.=	'<div class="return-back">';
	$s.=		'<a href="index.php" class="link-simple-blue">Вернуться к списку файлов</a>';
	$s.=	'</div>';
	$s.=  '</div>';
	$s.='</div>';
	return $s;	
}

} ?>
