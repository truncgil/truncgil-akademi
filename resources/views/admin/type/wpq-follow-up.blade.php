<?php 

use App\Models\WelderTest; 

$title = "Naks Welder";
$tableWidth="800%";
$path = "admin.type.wpq-follow-up";
$listDatas = WelderTest::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "welder_tests";

$relationDatas = [
    'naks_no' => [
        'datas' => db("naks_welders")->get(),
        'pattern' => '{naks_certificate_no}',
        'type' => 'multiple-choice',
        //'seperate' => ' + '
    ],
];

?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>