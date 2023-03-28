<?php 

use App\Models\WelderTest; 

$title = "Naks Welder";
$tableWidth="800%";
$path = "admin.type.wpq-follow-up";
$listDatas = WelderTest::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "welder_tests";
$naksWelders = db("naks_welders")->get();
$relationDatas = [
    'naks_no' => [
        'table' => 'naks_welders',
        'datas' => $naksWelders,
        'value' => 'naks_certificate_no',
        'text' => ['naks_certificate_no'],
        'type' => 'select',
        'affected' => [
            'name_surname' => '{welder_name_ru}',
            'naks_id' => '{welder_id}',
            'technology_range' => '{group_of_technical_device}',
            'material_group_gost' => '{material}',
            'naks_validity' => '{period_of_validity}',
            'wps_no' => '{wps_no}',
            'welding_date' => '{wps_date}',
            'material_group_1' => '{ru_group}',
        ]
    ],
];

?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>