<?php 

use App\Models\NaksWelder; 

$title = "Naks Welder";
$tableWidth="400%";
$path = "admin.type.naks-welder";
$listDatas = NaksWelder::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "naks_welders";
$users = db("users")->whereIn("level", ['Welder', 'Engineer'])->get();
$weldingMethods = db("welding_methods")->whereNotIn('ru_short_name',['*'])->get();
$productType = db("product_types")->get();
$jointType = db("joint_types")->get();
$hazardClasses = db("hazard_classes")->get();
$materials = db("materials")->whereNotIn("ru_group", ['*'])->groupBy("ru_group")->get();
$weldingPositions = db("welding_positions")->get();
$subcontractors = db("subcontractors")->get();


$blockGroup = [
    'General Information' => [
        'user_id',
        'welder_name_ru',
        'welder_name_en',
        'year_of_birth',
        'company',
        'qualitification_category',
        'work_experience',
        'welder_id',
        'process',
        'component',
        'weld_type',
        'naks_certificate_no',
        'period_of_validity',
        'group_of_technical_device',
    ],

];

for($k=1;$k<=4;$k++) {
    $blockGroup['Material ' . $k] = [
        'material_' . $k,
        'diameter_min_' . $k,
        'diameter_max_' . $k,
        'min_thick_' . $k,
        'max_thick_' . $k,
    ];
    $columnResize['material-' . $k]['class'] = "col-md-6";
    $columnResize['material-' . $k]['color'] = 10;
    $columnResize['material-' . $k]['border'] = true;
    $columnResize['material-' . $k]['content-class'] = "bg-gray";
}

$blockGroup['Result'] = [
    'welding_position',
    'order_no',
    'date',
];

$columnResize['result']['content-class'] = "bg-white";
$columnResize['result']['color'] = 19;

$columnResize['general-information']['class'] = "col-md-12";
$columnResize['general-information']['color'] = 30;
$columnResize['general-information']['border'] = true;






$relationDatas = [
    'user_id' => [
        'table' => 'users',
        'datas' => $users,
        'value' => 'id',
        'text' => ['registration_no', 'name'],
        'type' => 'select',
        'affected' => [
            'year_of_birth' => '{date_of_birth}',
            'welder_name_ru' => '{name_ru}',
            'welder_name_en' => '{name}',
            'company' => '{subcontructer}',
            'qualitification_category' => '{qualitification}',
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
<script>
    $(function(){

    })
</script>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>