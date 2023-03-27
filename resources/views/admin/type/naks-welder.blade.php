<?php 

use App\Models\NaksWelder; 

$title = "Naks Welder";
$tableWidth="400%";
$path = "admin.type.naks-welder";
$listDatas = NaksWelder::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "naks_welders";
$users = db("users")->where("level", "LIKE","Welder%")->get();
$weldingMethods = db("welding_methods")->get();
$productType = db("product_types")->get();
$jointType = db("joint_types")->get();
$hazardClasses = db("hazard_classes")->get();
$materials = db("materials")->get();
$weldingPositions = db("welding_positions")->get();
$subcontractors = db("subcontractors")->get();

$relationDatas = [
    'user_id' => [
        'table' => 'users',
        'datas' => $users,
        'value' => 'id',
        'text' => ['name'],
        'type' => 'select',
        'affected' => [
            'year_of_birth' => '{date_of_birth}',
            'welder_name_ru' => '{name_ru}',
            'welder_name_en' => '{name}',
            'company' => '{company}',
        ]
    ],
    'process' => [
        'datas' => $weldingMethods,
        'pattern' => '{ru_short_name}',
        'type' => 'select-dropdown'
    ],
    'component' => [
        'datas' => $productType,
        'pattern' => '{short_name_ru}',
        'type' => 'multiple-choice'
    ],

    'weld_type' => [
        'datas' => $jointType,
        'pattern' => '{short_name_ru} {short_name_en}',
        'type' => 'multiple-choice'
    ],
    'group_of_technical_device' => [
        'datas' => $hazardClasses,
        'pattern' => '{serial_number}',
        'type' => 'multiple-choice'
    ],
    'material' => [
        'datas' => $materials,
        'pattern' => '{ru_group}',
        'type' => 'multiple-choice'
    ],
    'welding_position' => [
        'datas' => $weldingPositions,
        'pattern' => '{gost}/{en}',
        'type' => 'multiple-choice'
    ],

    'company' => [
        'datas' => $subcontractors,
        'pattern' => '{company_name_en}',
        'type' => 'multiple-choice'
    ],

    
   
];

?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>