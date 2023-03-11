<?php 

use App\Models\WelderTest; 

$title = "Naks Welder";
$tableWidth="700%";
$path = "admin.type.wpq-follow-up";
$listDatas = WelderTest::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "welder_tests";
/*
$relationDatas = [
    'short_number' => [
        'table' => 'naks_centers',
        'value' => 'center_no',
        'text' => ['center_no'],
        'type' => 'select',
        'affected' => [
            'short_name' => 'center_name',
        ]
    ],
    'welding_method' => [
        'table' => 'welding_methods',
        'value' => 'ru_short_name',
        'text' => ['ru_short_name', 'iso_short_name', 'aws_short_name'],
        'type' => 'select'
    ],
];
*/
?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>