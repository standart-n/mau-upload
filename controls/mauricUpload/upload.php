<?php class upload {

function engine(&$q) { $upload=false;
	if ($q->url->action=="upload") {
		if (isset($_FILES['userfile']['tmp_name'])) {
			$done=$this->uploadFile($q);
			$upload=true;
		}
	}
	if (isset($done)) { 
		if ($done) { $res=true; } else { $res=false; }
	}
	if (isset($res)) {
		$q->fn->toModel($q,$this->showRes($q,$res),"content");
	} else {
		$q->fn->toModel($q,$this->showUpload($q),"content");
	}
}

function uploadFile(&$q) { $done=false;
	$id=intval($_REQUEST['file_id']);
	$caption=$q->fn->toWin(trim(strval($_REQUEST['caption'])));
	$tmp=$_FILES['userfile']['tmp_name'];
	$name=$_FILES['userfile']['name'];
	$path="files/".$name;
	if (isset($_FILES['userfile'])) {
		if (isset($tmp)) {
			if (move_uploaded_file($tmp,$path)) {
				if ($id>0) {
					if ($this->updateFile($q,$name,$path,$caption,$id)) {
						$done=true;
					}
				} else {
					if ($this->addFile($q,$name,$path,$caption)) {
						$done=true;
					}
				}
				if ($done) {
					$q->replace->makeReplace($path);
				}
			}			
		}		
	}
	return $done;
}

function addFile($q,$name,$path,$caption) { $add=false;
	$sql=$q->sql_upload->addFile($q,$name,$path,$caption);
	$query=ibase_query($q->fdb_it,$sql);
	if (isset($query)) { if ($query) {
		ibase_commit($q->fdb_it);
		$q->fdb_ist=ibase_trans(IBASE_WRITE+IBASE_COMMITTED+IBASE_REC_VERSION+IBASE_NOWAIT,$q->fdb_db);
		$add=true;
	} }
	return $add;
}

function updateFile($q,$name,$path,$caption,$id) { $add=false;
	$sql=$q->sql_upload->updateFile($q,$name,$path,$caption,$id);
	$query=ibase_query($q->fdb_it,$sql);
	if (isset($query)) { if ($query) {
		ibase_commit($q->fdb_it);
		$q->fdb_it=ibase_trans(IBASE_WRITE+IBASE_COMMITTED+IBASE_REC_VERSION+IBASE_NOWAIT,$q->fdb_db);
		$add=true;
	} }
	return $add;
}


function showUpload(&$q) { $s="";
	$s.=$q->tpl_upload->upload($q);
	return $s;
}

function showRes(&$q,$res) { $s="";
	$s.=$q->tpl_upload->res($q,$res);
	return $s;
}

function recaption(&$q) { $s=""; $u=$q->url; $done=false;
	$u->value=$q->fn->toWin($u->value);
	$sql=$q->sql_upload->recaptionFile($q,$u->id,$u->value);
	$query=ibase_query($q->fdb_it,$sql);
	if (isset($query)) { if ($query) {
		ibase_commit($q->fdb_it);
		$q->fdb_it=ibase_trans(IBASE_WRITE+IBASE_COMMITTED+IBASE_REC_VERSION+IBASE_NOWAIT,$q->fdb_db);
		$done=true;
	} }
	return $done;
}

function del(&$q) { $s=""; $u=$q->url; $done=false;
	$sql=$q->sql_upload->delFile($q,$u->id);
	$query=ibase_query($q->fdb_it,$sql);
	if (isset($query)) { if ($query) {
		ibase_commit($q->fdb_it);
		$q->fdb_it=ibase_trans(IBASE_WRITE+IBASE_COMMITTED+IBASE_REC_VERSION+IBASE_NOWAIT,$q->fdb_db);
		$done=true;
	} }
	return $done;
}

function activate(&$q) { $s=""; $u=$q->url; $done=false;
	$sql=$q->sql_upload->activateFile($q,$u->id);
	$query=ibase_query($q->fdb_it,$sql);
	if (isset($query)) { if ($query) {
		ibase_commit($q->fdb_it);
		$q->fdb_it=ibase_trans(IBASE_WRITE+IBASE_COMMITTED+IBASE_REC_VERSION+IBASE_NOWAIT,$q->fdb_db);
		$done=true;
	} }
	return $done;
}

} ?>
