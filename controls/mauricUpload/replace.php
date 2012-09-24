<?php class replace {

function makeReplace($path) {
    if (file_exists($path)) { if (fopen($path,"r")) {
		$s=file_get_contents($path);
		$s=preg_replace('/<img src="(.*)" width/','<img src="http://mauric.ru/_reports/img/mauricReports/img0.jpg" width',$s);
		file_put_contents($path,$s);
	} }	
}

} ?>
