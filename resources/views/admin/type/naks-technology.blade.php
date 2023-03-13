<?php 

use App\Models\NaksCertificate; 

$title = "Certificates";
$tableWidth="400%";
$path = "admin.type.naks-technology";
$listDatas = NaksCertificate::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "naks_certificates";

$materials = db('materials')->get();

$relationDatas = [
    'short_number' => [
        'table' => 'naks_centers',
        'datas' => db('naks_centers')->get(),
        'value' => 'center_no',
        'text' => ['center_no'],
        'type' => 'select',
        'affected' => [
            'short_name' => '{center_name}',
        ]
    ],
    'welding_method' => [
        'table' => 'welding_methods',
        'datas' => db('welding_methods')->get(),
        'value' => 'ru_short_name',
        'text' => ['ru_short_name'],    
        'type' => 'select', 
    ],
    'mat_group_1' => [
        'datas' => $materials,
        'pattern' => '{ru_group}{short_name}',
        'type' => 'select-dropdown'
    ],
];
?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>