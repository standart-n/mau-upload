<?php class sql_files {

function addFile($q,$name,$path) { $s=""; $t=time();
	$s.="INSERT INTO WEB_FILE ";
	$s.="(NAME_FILE,PATH_FILE,TIME_FILE,STATUS) VALUES ";
	$s.="('".$name."','".$path."',".$t.",0)";
	return $s;	
}

function showFiles($q) { $s="";
	$s.="SELECT * FROM WEB_FILE WHERE (1=1) ";
	$s.="AND (STATUS=0) ";
	$s.="ORDER by TIME_FILE DESC ";
	return $s;
}

} ?>
