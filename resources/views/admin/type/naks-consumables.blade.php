<?php 

use App\Models\NaksConsumable; 

$title = "Naks Consumables";
$tableWidth="400%";
$path = "admin.type.naks-consumables";
$listDatas = NaksConsumable::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "naks_consumables";

$weldingConsumables = db("welding_consumables")->get();
$materials = db("materials");

$relationDatas = [
    'type_of_consumable' => [
        'datas' => db("type_of_consumables")->get(),
        'pattern' => '{title_en} / {title_ru}',
        'type' => 'select-dropdown'
    ],
    'brand' => [
        'datas' => db("welding_materials_brends")->groupBy("title")->get(),
        'pattern' => '{title}',
        'type' => 'select-dropdown'
    ],
    'product_name' => [
        'datas' => $weldingConsumables,
        'pattern' => '{brend}',
        'type' => 'select-dropdown'
    ],
    'aws_classification' => [
        'datas' => $weldingConsumables,
        'pattern' => '{aws_class} {aws_specification}',
        'type' => 'select-dropdown'
    ],
    'group_of_base_material' => [
        'datas' => $materials->groupBy("short_name")->get(),
        'pattern' => '{short_name}',
        'type' => 'select-dropdown'
    ],
    'base_material' => [
        'datas' => $materials->groupBy("steel_grade")->get(),
        'pattern' => '{steel_grade}',
        'type' => 'select-dropdown'
    ],

   
];

?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>