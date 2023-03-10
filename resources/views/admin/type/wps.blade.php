<?php 
use App\Models\WPS; 

$title = "WPS";
$tableWidth="300%";
$listDatas = WPS::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "w_p_s";
/*
$relationDatas = [
    'short_name' => [
        'data' => NaksCenter::all(),
        'value' => 'center_no',
        'html' => ['center_no', 'center_name'],
        'type' => 'select',
        'multiple' => false
    ],
    'welding_method' => [
        'data' => WeldingMethod::all(),
        'value' => 'ru_short_name',
        'html' => ['ru_short_name', 'iso_short_name', 'aws_short_name'],
        'type' => 'select',
        'multiple' => false
    ],
];
*/
?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>