<?php 
use App\Models\NaksCenter; 
use App\Models\WeldingMethod; 
use App\Models\NaksCertificate; 

$title = "Certificates";
$tableWidth="300%";
$path = "admin.type.naks-technology";
$listDatas = NaksCertificate::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "naks_certificates";
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
?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>