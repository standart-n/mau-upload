<?php class validate {

function vId(&$id) {
	$id=intval($id); if ($id<1) { $id=1; }
}

function vSkip(&$id) {
	$id=intval($id); if ($id<0) { $id=0; }
}

function search(&$s,$conv=true) { $rt=false;
	if (($s!="") && ($s!="Поиск по всем товарам...")) {
		if ($conv) {
			$s=iconv("UTF-8","cp1251",$s);
		}
		$rt=true;
	} else {
		$rt=false;
	}
	return $rt;
}

function urlSort(&$sort) {
	$sort=trim(strtoupper($sort));
	switch ($sort) {
		case "SNAME": break;
		case "SCOUNTRY": break;
		case "SERIA": break;
		case "PRICE": break;
		default: $sort="SNAME";
	} 
}

function urlGrad(&$grad) {
	$grad=trim(strtoupper($grad));
	switch ($grad) {
		case "ASC": break;
		case "DESC": break;
		default: $grad="ASC";
	}
}


function vInt(&$id) {
	$id=intval(trim($id));	
}

function vStr(&$s) {
	$s=trim(strval($s));
}


function vQuery(&$s) {
	$s=trim(strval($s));
}


} ?>
