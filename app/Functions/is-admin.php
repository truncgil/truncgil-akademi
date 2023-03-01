<?php function isAdmin($u = null) { 
    if(is_null($u)) {
        $u = u();
    }
    if($u->level=="Admin") {
        return true;
    } else {
        return false;
    }
} ?>