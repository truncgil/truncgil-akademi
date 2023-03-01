<?php 
$template = db("mail_templates")->where("id",get("id"))->first();
$manuscript = db("manuscripts")->where("id",get("mid"))->first();
$user = u2($manuscript->uid);
//dump($user);
$json = j($manuscript->json);
if(getisset("send")) {
     ?>
     @include("admin-ajax.mail-send")
     <?php 
}
$authors = $json['authors'];
//dump($json);
//dump($template);

/*
$html = str_replace("{prefix}",$u['prefix'],$html);
	$html = str_replace("{adi}",$u['name'],$html);
	$html = str_replace("{email}",$u['email'],$html);
	$html = str_replace("{surname}",$u['surname'],$html);
	$html = str_replace("{institution}",$u['institution'],$html);
	$html = str_replace("{country}",$u['country'],$html);
	$html = str_replace("{id}",$c['slug'],$html);
	$html = str_replace("{title}",$c['title'],$html);
	$html = str_replace("{file}","<a href='$url/{$c['files']}'>$url/{$c['files']}</a>",$html);
	$html = str_replace("{abstract}",$j['html'],$html);
	$title = str_replace("{id}",$c['code'],post("title"));
	$title = str_replace("{mail}",$u['email'],$title);
*/
$variables = [
    '{id}',
    '{prefix}',
    '{title}',
    '{file}',
    '{name}',
    '{surname}',
    '{email}',
    '{institution}',
    '{country}',
    '{abstract}',
];
?>
<div class="result-ajax"></div>
<form action="?ajax=mail-template&id={{get("id")}}&mid={{get("mid")}}&send" class="serialize" method="post">
    @csrf

    <input type="checkbox" name="" value="{{$user->email}}" onclick="if($(this).is(':checked'))
        {
        $('#to').val('{{$user->email}}');
        } else {
        $('#to').val('');
        }" class="" id="coa">
    To ({{$user->email}}):
    <input type="text" name="to" id="to" class="form-control" required>

    <script>
	$(".mails").on("click",function(){
		var output = $.map($('.mails:checked'), function(n, i){
			return n.value;
		}).join(',');
		$("#cc").val(output);
	});
	$(".allmails").on("click",function(){
		if($(this).is(":checked")) {
			$("#cc").val($(this).val());
		} else {
			$("#cc").val("");
		}
		
	});
	</script> <br>
    	<?php 
	$ccmails= array();
	foreach($authors AS $ccm) {
		if($user->email!=$ccm['email']) {
			array_push($ccmails,$ccm['email']);
		}
	}
	
	?>
	<label><input type="checkbox" name="" value="<?php echo(implode(",",$ccmails)) ?>" class="allmails" id=""> All Corresponding Mails </label>
	<br>
	Bilgi (CC) (Separate with commas for multiple submissions): 
	<input class="form-control"  type="text" name="cc"  value="<?php // e(implode(",",$j['mails'])) ?>" id="cc" />


    Subject:
    <input type="text" name="title" value="{{$template->title2}}" id="" class="form-control">
    <div class="row mt-10">
    <?php foreach($variables AS $variable) {
        ?>
        <div class="col">
        <input type="text" editable="true" class="form-control"  readonly  value="{{$variable}}" >
        </div>
        <?php 
   } ?>
   </div>
   <br>
    Body:
    <textarea name="html" id="editor{{$template->id}}" cols="30" rows="10" class="">{{$template->html}}</textarea>
    <button type="submit" class="btn btn-primary mt-5">Send</button>
</form>
<script>
CKEDITOR.replace( 'editor{{$template->id}}', {

language: '{{App::getLocale()}}',

removePlugins: 'image',

extraPlugins: 'base64image'



});

</script>
@include("scripts.serialize")
