<?php class sql_upload {

function addFile($q,$name,$path,$caption) { $s=""; $t=time();
	$s.="INSERT INTO WEB_FILE ";
	$s.="(NAME_FILE,PATH_FILE,TIME_FILE,CAPTION,STATUS) VALUES ";
	$s.="('".$name."','".$path."',".$t.",'".$caption."',0)";
	return $s;	
}

function updateFile($q,$name,$path,$caption,$id) { $s=""; $t=time();
	$s.="UPDATE WEB_FILE SET ";
	$s.="NAME_FILE='".$name."', ";
	$s.="PATH_FILE='".$path."', ";
	$s.="CAPTION='".$caption."', ";
	$s.="TIME_FILE=".$t." ";
	$s.="WHERE id=".$id." ";
	return $s;	
}

function recaptionFile($q,$id,$caption) { $s="";
	$s.="UPDATE WEB_FILE SET ";
	$s.="CAPTION='".$caption."' ";
	$s.="WHERE id=".$id." ";
	return $s;	
}

function delFile($q,$id) { $s="";
	$s.="UPDATE WEB_FILE SET ";
	$s.="STATUS=1 ";
	$s.="WHERE id=".$id." ";
	return $s;	
}

function activateFile($q,$id) { $s="";
	$s.="UPDATE WEB_FILE SET ";
	$s.="STATUS=0 ";
	$s.="WHERE id=".$id." ";
	return $s;	
}

} ?>
