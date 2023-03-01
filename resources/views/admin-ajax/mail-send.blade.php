<?php 
	//print_r($_POST);
	$c = (Array) $manuscript;
    
	$j = json_decode($c['json'],true);
    
	$u = (Array) $user;
	$url = env("APP_URL");
	$html = post("html");
	$html = str_replace("{prefix}",$u['prefix'],$html);
	$html = str_replace("{name}",$u['name'],$html);
	$html = str_replace("{email}",$u['email'],$html);
	$html = str_replace("{surname}",$u['surname'],$html);
	$html = str_replace("{institution}",$u['institution'],$html);
	$html = str_replace("{country}",$u['country'],$html);
	$html = str_replace("{id}",$c['slug'],$html);
	$html = str_replace("{title}",$c['title'],$html);
	$html = str_replace("{file}","<a href='$url/{$c['files']}'>$url/{$c['files']}</a>",$html);
	$html = str_replace("{abstract}",$j['html'],$html);
	$title = str_replace("{id}",$c['slug'],post("title"));
	$title = str_replace("{email}",$u['email'],$title);
	 
//	e($html);
	$mailler = explode(",",$_POST['to']);
	$maillercc = explode(",",$_POST['cc']);
	//$mailler = array_merge($mailler,$maillercc);
	$ccdizi = array();
	foreach($maillercc AS $cc) {
		if($cc!=$_POST['to']) {
			array_push($ccdizi,$cc);
		}
	}
	$ccdizi = implode(",",$ccdizi);
	foreach($mailler AS $m) {
		$m = trim($m);
		e("$m <br />");
		echo mailSend($m,$title,$html,$ccdizi);
		mailSend(env("MAIL_USERNAME"),$title,$html);
	}
	

	$alert = "{$_POST['to']} Delivered to e-mail addresses";
	if(!postesit("cc","")) {
		$alert = "{$_POST['to']},{$_POST['cc']},{$_POST['bcc']} Delivered to e-mail addresses";
	}
    bilgi($alert);
 
    exit();
	
 ?>