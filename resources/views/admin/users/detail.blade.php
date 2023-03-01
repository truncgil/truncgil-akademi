<?php 
if(isAdmin())  { 
 
 $user = db("users")
 ->orWhere("id",get("id"))
 ->orWhere("email",get("id"))
 ->first();
 if(getisset("update")) {
    $post = $_POST;
    if(!postesit("password","")) {
        $post['password'] = Hash::make($post['password']);
    }
    unset($post['_token']);
   echo db("users")
        ->where("id",get("update"))
        ->update($post);
    exit();
 }
 if($user)  { 
  
  ?>
  <form action="?ajax2=admin.users.detail&update={{$user->id}}" class="serialize" method="post" autocomplete="off">
      @csrf
      @include("admin.users.form")
      Notes:
      <textarea name="note" id="" cols="30" rows="10" class="form-control">{{$user->note}}</textarea>
    <br>
      <button type="submit" class="btn btn-primary btn-noborder btn-rounded">Update</button>
  
  </form>  
  <script>
    $(function(){
        <?php 
        unset($user->password);
        foreach($user AS $alan => $deger) {
             ?>
             $("[name='{{$alan}}']").val("{{$deger}}");
             <?php 
        } ?>
        $(".reemail").remove();
    });
</script>
  <?php } ?>

 <?php } ?>

@include("scripts.serialize")