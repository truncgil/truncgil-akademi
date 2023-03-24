<?php 

use App\Models\WeldingEquipment; 

$title = "NAKS Welding Equipments";
$tableWidth="200%";
$path = "admin.type.naks-welding-equipments";
$listDatas = WeldingEquipment::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "welding_equipment";

$relationDatas = [
    'working_status' => [
        'values' => [
            'Working',
            'Attestation waiting',
            'Repair',
            'Out of use',
        ],
        'type' => 'manuel-select'
    ],
    'groups_of_technical_devices' => [
        'datas' => db('hazard_classes')->groupBy("category_serial_number")->get(),
        'pattern' => '{category_serial_number}',
        'type' => 'multiple-choice'
    ],
    'type_of_welding_machine' => [
        'datas' => db('welding_machine_types')->get(),
        'pattern' => '{code}',
        'type' => 'multiple-choice'
    ],
    'type_of_weld' => [
        'datas' => db('welding_methods')->whereNotIn("ru_short_name", ['*'])->get(),
        'pattern' => '{ru_short_name}',
        'type' => 'multiple-choice'
    ],
    
];

?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>