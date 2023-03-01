<?php 
set_time_limit(0);
ini_set('max_execution_time', '0'); 
$other = db("other")->get();
$oth = [];
foreach($other AS $o) {
    $oth[$o->cid][str_slug($o->alan)] = $o->deger;
}

$content = db('content')->where('type','Articles')->get();


/*
foreach($content AS $c) {
    $volume = db("content")->where("slug",$c->kid)->pluck("kid")->first();
    $insert = [
        'title' => $c->title,
        'slug' => $c->slug,
        'kid' => $c->kid,
        'files' => @$oth[$c->slug]['link'],
        'html' => $c->html,
        'view' => $c->view,
        'comment' => $c->comment,
        'eye' => $c->eye,
        'cited' => $c->cited,
        'scopus_id' => $c->scopus_id,
        'cited_scopus' => $c->cited_scopus,
        'volume' => $volume,
        'issue' => $c->kid,
        'json' => json_encode_tr(@$oth[$c->slug])
    ]; 
    try {
       ekle2($insert,'articles');
       print2("INSERT  {$c->slug}");
    } catch (\Throwable $th) {
        db('articles')
            ->where('slug',$c->slug)
            ->update($insert);
       // echo($th);
        print2("UPDATE {$c->slug}");
    }
}


$content = db('content')->where('type','Volume')->get();

foreach($content AS $c) {
   
    $insert = [
        'title' => $c->title,
        'slug' => $c->slug,
        'kid' => $c->kid,
        'y' => 1,
        'html' => $c->html,
        'json' => json_encode_tr(@$oth[$c->slug])
    ]; 
    try {
       ekle2($insert,'volumes');
       print2("VOLUME INSERT  {$c->slug}");
    } catch (\Throwable $th) {
        db('volumes')
            ->where('slug',$c->slug)
            ->update($insert);
       // echo($th);
        print2("VOLUME UPDATE {$c->slug}");
    }
}

*/
/*
$content = db('content')->where('type','Issue')->get();

foreach($content AS $c) {
   
    $insert = [
        'title' => $c->title,
        'slug' => $c->slug,
        'kid' => $c->kid,
        'y' => 1,
        'html' => $c->html,
        'json' => json_encode_tr(@$oth[$c->slug])
    ]; 
    try {
       ekle2($insert,'issues');
       print2("ISSUE INSERT  {$c->slug}");
    } catch (\Throwable $th) {
        db('issues')
            ->where('slug',$c->slug)
            ->update($insert);
       // echo($th);
        print2("ISSUE UPDATE {$c->slug}");
    }
}
*/

$users = db("uyeler")->simplePaginate(5000);
foreach($users AS $u) {
    if($u->ilk_sifre=="") $u->ilk_sifre = rand(111111,999999);
    $password = Hash::make($u->ilk_sifre);
    $data = [
        'name' => $u->adi,
        'surname' => $u->soyadi,
        'level' => "Client",
        'email' => $u->mail,
        'country' => $u->country,
        'institution' => $u->institution,
        'prefix' => $u->prefix,
        'blacklist' => $u->blacklist,
        'recover' => $u->ilk_sifre,
        'phone' => $u->phone,
        'note' => $u->note,
        'password' => $password,
    ];

    firstOrUpdate($data,"users",[
        'email'=>$u->mail,
        'phone'=>$u->phone,
    ]);
}
?>