<? class files {

function engine(&$q) {
	$q->fn->toModel($q,$this->showFiles($q),"content");
}

function showFiles(&$q) { $s=""; $ms=array();
	$sql=$q->sql_files->showFiles($q);
	$query=ibase_query($q->fdb_it,$sql);
	if (isset($query)) { if ($query) {
		while ($r=ibase_fetch_object($query)) {
			foreach (array("CAPTION") as $key) {
				if (isset($r->$key)) {
					$r->$key=$q->fn->toUTF($r->$key);
				} else {
					$r->$key="";
				}
			}
			$ms[]=$r;
		}
	} }
	$s.=$q->tpl_files->files($q,$ms); 
	return $s;	
}

} ?>
