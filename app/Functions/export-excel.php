<?php 
 function export_excel($dizi, $dosya_adi) {
    $dizi = $dizi->toArray();
    
    $excepts = ['created_at', 'updated_at'];
    
    $filtered = [];
    foreach($dizi AS $key => $value) {
        foreach($excepts AS $except) {
            $value = (Array) $value;
            unset($value[$except]);
        }
        $filtered[] = $value;
    }


    $dizi = $filtered;

    $dosya_adi = (String) $dosya_adi;
    $icerik = "";
    foreach($dizi[0] AS $column => $value) {
        $icerik .= "$column\t";
    }
    $icerik .= "\r\n";
    foreach($dizi AS $column) {
        foreach($column AS $col => $value) {
            $icerik .= "$value\t";
        }
        $icerik .= "\r\n";
    }
    $icerik = trim($icerik);

    return response($icerik)
    ->header('Content-type','application/ms-excel')
    ->header('Content-Disposition','attachment; filename="'.$dosya_adi.'.xls"')
    ->send();
} ?>