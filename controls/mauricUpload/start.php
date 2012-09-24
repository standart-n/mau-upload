<?php class start {

function engine(&$q) {
	if ($this->init($q)) {
		$this->url($q);
		$this->settings($q);
			if ($q->login->engine($q)) {
				switch ($q->url->action) {
				case "recaption":
					$q->upload->recaption($q);
					$q->html="ajax";
				break;
				case "del":
					$q->upload->del($q);
					$q->html="ajax";
				break;
				case "activate":
					$q->upload->activate($q);
					$q->html="ajax";
				break;
				case "upload":
					$q->upload->engine($q);
				break;
				default:
					$q->files->engine($q);
				}
			}
	}
}

function init(&$q) { $rtn=true;
	if (!$q->base->tpl($q,"upload")) $rtn=false;
	if (!$q->base->tpl($q,"files")) $rtn=false;
	if (!$q->base->tpl($q,"login")) $rtn=false;

	if (!$q->base->sql($q,"upload")) $rtn=false;
	if (!$q->base->sql($q,"files")) $rtn=false;

	if (!$q->base->controls($q,"fn")) $rtn=false;
	if (!$q->base->controls($q,"validate")) $rtn=false;
	if (!$q->base->controls($q,"upload")) $rtn=false;
	if (!$q->base->controls($q,"replace")) $rtn=false;
	if (!$q->base->controls($q,"files")) $rtn=false;
	if (!$q->base->controls($q,"login")) $rtn=false;
	return $rtn;
}

function url(&$q) {
	$params=array("id","page");
	$q->validate->vQuery($link);
	if (isset($_REQUEST['id'])) { $q->url->id=intval($_REQUEST['id']); } else { $q->url->id=0; }
	if (isset($_REQUEST['page'])) { $q->url->page=strval($_REQUEST['page']); } else { $q->url->page="main"; }
	if (isset($_REQUEST['value'])) { $q->url->value=strval($_REQUEST['value']); } else { $q->url->value="none"; }
	if (isset($_REQUEST['action'])) { $q->url->action=strval($_REQUEST['action']); } else { $q->url->action="none"; }
	if (isset($_REQUEST['caption'])) { $q->url->caption=strval($_REQUEST['caption']); } else { $q->url->caption="Новый отчет"; }
}

function settings(&$q) {
	$q->cookie_time=time()+60*60*24*365;	
}


} ?>
