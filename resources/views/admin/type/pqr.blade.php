<?php 
use App\Models\ProsedureQualificationRecord; 
use App\Models\NaksCertificate; 
use App\Models\Material; 
use App\Models\WeldingConsumable; 

$title = "Procedure Qualification Records";
$tableWidth="300%";
$listDatas = ProsedureQualificationRecord::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "prosedure_qualification_records";

$relationDatas = [
    'naks_technology' => [
        'table' => 'naks_certificates',
        'value' => 'certificate_no',
        'text' => ['short_number', 'certificate_no'],
        'type' => 'select',
        'affected' => [
            'technology_category' => 'technology_category',
            'welding_method' => 'welding_method',
        ]
    ],
    'base_metal' => [
        'table' => 'materials',
        'value' => 'steel_grade',
        'text' => ['steel_grade', 'product_name'],
        'type' => 'select',
        'affected' => [
            'technology_category' => 'technology_category',
        ]
    ],
    'welding_method' => [
        'table' => 'materials',
        'value' => 'steel_grade',
        'text' => ['steel_grade', 'product_name'],
        'type' => 'select',
        'affected' => [
            'technology_category' => 'technology_category',
        ]
    ],
    'type_grade_1' => [
        'table' => 'materials',
        'value' => 'steel_grade',
        'text' => ['steel_grade'],
        'type' => 'select',
        'affected' => [
            'russian_standart_group_no' => 'mat_group_1',
        ]
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