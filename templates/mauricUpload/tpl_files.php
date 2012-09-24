<?php class tpl_files {

function files($q,$ms) { $s="";
	$s.='<div id="form-files">';
	$s.=	'<div id="form-header">';
	$s.=		'<div id="form-caption">';
	$s.=			'Загруженные файлы';
	$s.=		'</div>';
	$s.=		'<a class="link-blue form-header-link" href="index.php?action=upload&type=new">';
	$s.=			'Загрузить новый отчет';
	$s.=		'</a>';
	$s.=	'</div>';
	$s.=	'<div id="form-table">';
	$s.=		'<table cellpadding="3" cellspacing="0" border="0">';
	$s.=			'<tr>';
	$s.=				'<td width="40px">';
	$s.=				'</td>';
	$s.=				'<td align="left" width="400px">';
	$s.=					'<div class="form-table-caption">';
	$s.=						'Заголовок';
	$s.=					'</div>';
	$s.=				'</td>';
	$s.=				'<td align="left" width="200px">';
	$s.=					'<div class="form-table-caption">';
	$s.=						'Имя файла';
	$s.=					'</div>';
	$s.=				'</td>';
	$s.=				'<td align="left" width="100px">';
	$s.=				'</td>';
	$s.=			'</tr>';
	if (sizeof($ms)>0) {
		foreach ($ms as $r) {
			$s.=	'<tr>';
			$s.=		'<td align="center">';
			$s.=			'<div class="form-table-id">';
			$s.=				'#'.$r->ID;
			$s.=			'</div>';
			$s.=		'</td>';
			$s.=		'<td align="left">';
			$s.=			'<div class="form-table-line status-hide-'.$r->ID.'">';
			$s.=				'<input ';
			$s.=					'id="input-caption-'.$r->ID.'" ';
			$s.=					'data-id="'.$r->ID.'" ';
			$s.=					'type="text" ';
			$s.=					'value="'.$r->CAPTION.'" ';
			$s.=				'>';
			$s.=			'</div>';
			$s.=			'<a class="link-simple table-link-activate status-show-'.$r->ID.'" data-id="'.$r->ID.'" ';
			$s.=				'href="#activate">Восстановить';
			$s.=			'</a>';
			$s.=		'</td>';
			$s.=		'<td align="left">';
			$s.=			'<div class="form-table-line status-hide-'.$r->ID.'">';
			$s.=				$r->NAME_FILE;
			$s.=			'</div>';
			$s.=		'</td>';
			$s.=		'<td align="left">';
			$s.=			'<div class="status-hide-'.$r->ID.'">';
			$s.=			'<a class="table-link table-link-reload" id="link-reload-'.$r->ID.'" ';
			$s.=				'href="index.php?action=upload&id='.$r->ID.'&caption='.$r->CAPTION.'">';
			$s.=			'</a>';
			$s.=			'<a class="table-link table-link-delete" data-id="'.$r->ID.'" ';
			$s.=				'href="#delete">';
			$s.=			'</a>';
			$s.=			'</div>';
			$s.=		'</td>';
			$s.=	'</tr>';
		}
	}	
	$s.=		'</table>';
	$s.=	'</div>';
	$s.='</div>';
	return $s;
}

} ?>
