<?php 

use App\Models\NaksCertificate; 

$title = "Certificates";
$tableWidth="400%";
$path = "admin.type.naks-technology";
$listDatas = NaksCertificate::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "naks_certificates";

$materials = db('materials')->groupBy("ru_group")->get();
$jointTypes = db("joint_types")->get();
$jointViews = db("joint_views")->get();
$weldingPositions = db("welding_positions")->get();

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
        'datas' => db('welding_methods')->whereNotIn("ru_short_name",['*'])->get(),
        'value' => 'ru_short_name',
        'text' => ['ru_short_name'],    
        'type' => 'select', 
    ],
    'mat_group_1' => [
        'datas' => $materials,
        'pattern' => '{ru_group}-{short_name}',
        'type' => 'select-dropdown'
    ],
    'mat_group_2' => [
        'datas' => $materials,
        'pattern' => '{ru_group}-{short_name}',
        'type' => 'select-dropdown'
    ],
    'welding_consumable' => [
        'datas' => db("welding_consumables")->get(),
        'pattern' => '{brend}',
        'type' => 'multiple-choice'
    ],
    'technology_category' => [
        'datas' => db("hazard_classes")->groupBy("category_serial_number")->get(),
        'pattern' => '{category_serial_number}',
        'type' => 'select-dropdown'
    ],
    'work_type' => [
        'datas' => db("work_types")->get(),
        'pattern' => '{title_en}',
        'type' => 'select-dropdown'
    ],
    'performed_works_type' => [
        'datas' => db('performed_work_types')->get(),
        'pattern' => '{title}',
        'type' => 'multiple-choice'
    ],
    'joint_type' => [
        'datas' => $jointTypes,
        'pattern' => '{short_name_ru}',
        'type' => 'select-dropdown'
    ],
    'joint_view' => [
        'datas' => $jointViews,
        'pattern' => '{short_name_ru}',
        'type' => 'multiple-choice'
    ],
    'connection_type' => [
        'datas' => $jointTypes,
        'pattern' => '{naks_name}',
        'type' => 'multiple-choice'
    ],
    
    'electrode_coating' => [
        'datas' => db('electrode_coatings')->get(),
        'pattern' => '{short_name_ru}',
        'type' => 'multiple-choice',
        'disabled' => [
            'column' => 'welding_method',
            'type' => '!=',
            'value' => 'РД',
        ],
    ],
    'welding_equipment' => [
        'datas' => db("welding_machine_types")->get(),
        'pattern' => '{code}',
        'type' => 'multiple-choice'
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
    'position' => [
        'datas' => $weldingPositions,
        'pattern' => '{gost}',
        'type' => 'multiple-choice',
        'seperator' => ';'
    ],
];
?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>