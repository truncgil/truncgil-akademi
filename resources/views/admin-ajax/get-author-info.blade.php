<?php 
if(isset($_SESSION['authors'][get("email")])) {
    echo "-1";
} else {
    $user = db("users")->select(
        "prefix",
        "name",
        "surname",
        "institution",
        "orcid",
        "country",
        
        )->where("email",get("email"))->first();
    
    echo json_encode_tr($user);
}

?>