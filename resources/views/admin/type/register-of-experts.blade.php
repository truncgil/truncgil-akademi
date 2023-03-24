<?php 

use App\Models\RegisterOfExpert; 

$title = "Register of Experts";
$tableWidth="300%";
$path = "admin.type.naks-consumables";
$listDatas = RegisterOfExpert::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "register_of_experts";

$relationDatas = [
    'employees_id' => [
        'table' => 'users',
        'datas' => db('users')->where("level","like","Welder%")->get(),
        'value' => 'id',
        'text' => ['name_en','name_ru'],    
        'type' => 'select',
        'affected' => [
            'name_ru' => '{name_ru}',
            'name_en' => '{name_en}',
            'date_of_birth' => '{date_of_birth}',
        ]
    ],
    'groups_of_technical_devices' => [
        'datas' => db("hazard_classes")->groupBy("serial_number")->get(),
        'pattern' => '{serial_number}',
        'type' => 'multiple-choice'
    ],
  
];

?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>