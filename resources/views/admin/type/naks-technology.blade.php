<?php 

use App\Models\NaksCertificate; 

$title = "Certificates";
$tableWidth="400%";
$path = "admin.type.naks-technology";
$listDatas = NaksCertificate::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "naks_certificates";

$materials = db('materials')->get();
$jointTypes = db("joint_types")->get();

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
    'mat_group_2' => [
        'datas' => $materials,
        'pattern' => '{ru_group}{short_name}',
        'type' => 'select-dropdown'
    ],
    'welding_consumable' => [
        'datas' => db("welding_consumables")->get(),
        'pattern' => '{brend}',
        'type' => 'select-dropdown'
    ],
    'technology_category' => [
        'datas' => db("hazard_classes")->get(),
        'pattern' => '{serial_number}',
        'type' => 'select-dropdown'
    ],
    'work_type' => [
        'datas' => db("work_types")->get(),
        'pattern' => '{title_en}',
        'type' => 'select-dropdown'
    ],
    'performed_works_type' => [
        'datas' => db('performed_work_types')->get(),
        'key' => 'title',
        'type' => 'multiple-choice'
    ],
    'joint_type' => [
        'datas' => $jointTypes,
        'pattern' => '{short_name_ru}',
        'type' => 'select-dropdown'
    ],
    'joint_view' => [
        'datas' => $jointTypes,
        'pattern' => '{definition_ru}',
        'type' => 'select-dropdown'
    ],
    'connection_type' => [
        'datas' => $jointTypes,
        'pattern' => '{naks_name}',
        'type' => 'select-dropdown'
    ],
    
    'electrode_coating' => [
        'datas' => db('electrode_coatings')->get(),
        'key' => 'short_name_ru',
        'type' => 'multiple-choice'
    ],
    'welding_equipment' => [
        'datas' => db("welding_machine_types")->get(),
        'pattern' => '{purpose_ru}',
        'type' => 'select-dropdown'
    ],
    'pwht' => [
        'values' => [
            'YES',
            'NO',
        ],
        'type' => 'manuel-select'
    ],
    'pre_heating' => [
        'values' => [
            'YES',
            'NO',
        ],
        'type' => 'manuel-select'
    ],
];
?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>