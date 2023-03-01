<?php 
$u = u();
$post = $_POST;
unset($post['_token']);
unset($post['name']);
unset($post['surname']);
unset($post['prefix']);

if(!postesit("password","")) {

    $post['password'] = Hash::make(post("password"));
    $subject = "Your password has been changed.";
    mailSend($u->email,$subject,"Your password has just been successfully changed. If you think you didn't do this. Contact us immediately and reset your password.");
    bilgi($subject);
} else {
    unset($post['password']);
}

db("users")
    ->where("id",$u->id)
    ->update($post);

    bilgi("Your information has been successfully updated.");
?>
 