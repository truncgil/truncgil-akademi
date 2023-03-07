<?php 
/**
 * Try catch kullanarak ekler veya günceller
 */
function firstOrUpdate($data, $table,$where,$debug=false) {

    if($data['id']=="") {
        unset($data['id']);
    }

    try {
        $data['created_at'] = simdi();
        $id = db($table)->insertGetId($data);
        return $id;
    } catch (\Throwable $th) {
        
        if($debug) {
            dump($th);
        }
        
        
        $affectedRows = db($table)->where($where)->update($data);
        return "update $affectedRows";
    }
    
} ?>