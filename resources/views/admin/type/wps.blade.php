<?php 
use App\Models\WPS; 

$title = "WPS";
$tableWidth="700%";
$listDatas = WPS::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "w_p_s";
$pqr = db("prosedure_qualification_records")->get();
$naksCertificates = db("naks_certificates")->groupBy("certificate_no")->get();
$weldingMethods = db("welding_methods")->whereNotNull("ru_short_name")->get();
$jointTypes = db("joint_types")->get();
$ruWeldingGeometries = db("ru_welding_geometries")->get();
$weldingPositions = db("welding_positions")->get();
$materials = db("materials")->groupBy("steel_grade")->get();
$currentTypes = db("current_types")->get();
$workTypes = db("work_types")->get();

$relationDatas = [
    'pqr_no' => [
        'table' => 'prosedure_qualification_records',
        'datas' => $pqr,
        'value' => 'pqr_no',
        'text' => ['pqr_no'],
        'type' => 'select',
        'affected' => [
            'russian_standard_group_no_1' => '{russian_standart_group_no}',
            'russian_standard_group_no_2' => '{russian_standart_group_no_2}',
            'p_no_from' => '{p_no_from}',
            'p_no_from' => '{p_no_to}',
            'filler_metals_sfa_no' => '{filter_metals_aws_sfa_no_class}',
            'filler_metals_gost' => '{filter_metals_gost}',
            'pre_heating_min' => '{pre_heating_min}',
            'inter_pass_max' => '{inter_pass_max}',
            'pwht_temp_range' => '{pwht_temp_range}',
            'pwht_min_time' => '{pwht_min_time}',
            'shielding_gas' => '{shielding_gas}',
            'backing_gas' => '{backing_gas}',
            'current_polarity' => '{current_polarity}',
            'work_type' => '{work_type}',
            'joint_type_definition' => '{joint_design}',
            'naks_certificate_no' => '{naks_technology}',
            'technology_category' => '{technology_category}',
            'work_type' => '{base_metal}',
        ]
    ],
    'naks_certificate_no' => [
        'datas' => $naksCertificates,
        'pattern' => '{certificate_no}',
        'type' => 'multiple-choice'
    ],
    'work_type' => [
        'datas' => $workTypes,
        'pattern' => '{title_en}',
        'type' => 'select-dropdown'
    ],
    'group_of_technical_devices' => [
        'table' => 'prosedure_qualification_records',
        'datas' => $naksCertificates,
        'value' => 'technology_category',
        'text' => ['technology_category'],
        'type' => 'select',
        'affected' => []
    ],
    'welding_process_method' => [
        'datas' => $weldingMethods,
        'pattern' => '{ru_short_name}+{aws_short_name}/{en_welding_number}',
        'type' => 'multiple-choice'
    ],
    'joint_type' => [
        'datas' => $jointTypes,
        'pattern' => '{short_name_en}',
        'type' => 'select-dropdown'
    ],
    'ru_joint_geometry' => [
        'datas' => $ruWeldingGeometries,
        'pattern' => '{connection_symbol}',
        'type' => 'select-dropdown'
    ],
    'current_polarity' => [
        'datas' => $currentTypes,
        'pattern' => '{title}',
        'type' => 'multiple-choice'
    ],
    'welding_position' => [
        'datas' => $weldingPositions,
        'pattern' => '{gost}({en})',
        'type' => 'multiple-choice'
    ],
    'type_grade' => [
        'datas' => $materials,
        'pattern' => '{steel_grade}',
        'type' => 'multiple-choice',
        'max' => 2
    ],
   
   
];

?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>