<?php 
use App\Models\ProsedureQualificationRecord; 
use App\Models\NaksCertificate; 
use App\Models\Material; 
use App\Models\WeldingConsumable; 

$title = "Procedure Qualification Records";
$tableWidth="500%";
$listDatas = ProsedureQualificationRecord::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "prosedure_qualification_records";
$materials = db('materials')->get();
$weldingPositions = db('welding_positions')->get();
$weldingConsumables = db('welding_consumables')->get();
$currentTypes = db('current_types')->get();
$jointTypes = db('joint_types')->get();
$relationDatas = [
    'naks_technology' => [
        'table' => 'naks_certificates',
        'datas' => db('naks_certificates')->get(),
        'value' => 'certificate_no',
        'text' => ['short_number', 'certificate_no'],
        'type' => 'select',
        'affected' => [
            'technology_category' => '{technology_category}',
            'welding_method' => '{welding_method}',
            'shielding_gas' => '{shielding_gas}',
        ]
    ],
    'base_metal' => [
        'table' => 'materials',
        'datas' => $materials,
        'value' => 'steel_grade',
        'text' => ['steel_grade'],
        'type' => 'select',
        'affected' => []
    ],
    
    'position' => [
        'datas' => $weldingPositions,
        'pattern' => '{gost}/{en}',
        'type' => 'multiple-choice'
    ],
    'type_grade_1' => [
        'table' => 'materials',
        'datas' => $materials,
        'value' => 'steel_grade',
        'text' => ['steel_grade'],
        'type' => 'select',
        'affected' => [
            'russian_standart_group_no' => '{ru_group}',
            'p_no_from' => '{iso}',
        ]
    ],
    'type_grade_2' => [
        'table' => 'materials',
        'datas' => $materials,
        'value' => 'steel_grade',
        'text' => ['steel_grade'],
        'type' => 'select',
        'affected' => [
            'russian_standart_group_no_2' => '{ru_group}',
            'p_no_to' => '{iso}',
        ]
    ],
    'brend' => [
        'table' => 'welding_consumables',
        'datas' => $weldingConsumables,
        'value' => 'brend',
        'text' => ['brend'],
        'type' => 'select',
        'affected' => [
            'aws_sfa_no_class' => '{aws_class}-{aws_specification}',
            'gost' => '{gost_class}-{gost_specification}'
        ]
    ],
    'current_polarity' => [
        'table' => 'current_types',
        'datas' => $currentTypes,
        'value' => 'title',
        'text' => ['title'],
        'type' => 'select',
        'affected' => [
        ]
    ],
    'joint_design' => [
        'datas' => $jointTypes,
        'pattern' => '{definition_ru} {definition_en}',
        'type' => 'select-dropdown'
    ],
    /*
    'type_grade_1' => [
        'table' => 'naks_certificates',
        'value' => 'certificate_no',
        'text' => ['short_number', 'certificate_no'],
        'type' => 'select',
        'affected' => [
            'technology_category' => 'technology_category',
        ]
    ],
    'type_grade_2' => [
        'table' => 'naks_certificates',
        'value' => 'certificate_no',
        'text' => ['short_number', 'certificate_no'],
        'type' => 'select',
        'affected' => [
            'technology_category' => 'technology_category',
        ]
    ],
    'brend' => [
        'table' => 'naks_certificates',
        'value' => 'certificate_no',
        'text' => ['short_number', 'certificate_no'],
        'type' => 'select',
        'affected' => [
            'technology_category' => 'technology_category',
        ]
    ],
    */
    
   
];

?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>