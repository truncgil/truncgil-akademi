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
        'table' => 'hazard_classes',
        'datas' => db('hazard_classes')->get(),
        'key' => 'serial_number',
        'type' => 'multiple-choice'
    ],
    
];

?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>