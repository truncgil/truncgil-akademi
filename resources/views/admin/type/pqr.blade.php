<?php 
use App\Models\ProsedureQualificationRecord; 
use App\Models\NaksCertificate; 
use App\Models\Material; 
use App\Models\WeldingConsumable; 

$title = "Procedure Qualification Records";
$tableWidth="1000%";
$listDatas = ProsedureQualificationRecord::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "prosedure_qualification_records";
$materials = db('materials')->get();
$weldingPositions = db('welding_positions')->get();
$weldingConsumables = db('welding_consumables')->get();
$weldingMethods = db('welding_methods')->whereNotIn("ru_short_name",['*'])->get();
$currentTypes = db('current_types')->get();
$jointTypes = db('joint_types')->get();
$naksTechnology = db('naks_certificates')->get();
$workTypes = db('work_types')->get();

$relationDatas = [
    'naks_technology' => [
        'datas' => $naksTechnology,
        'pattern' => '{certificate_no}',
        'type' => 'multiple-choice',
        'seperator' => ' + '
    ],
    'base_metal_used_for_pqr_coupon' => [
        'datas' => $materials,
        'pattern' => '{steel_grade}',
        'type' => 'multiple-choice',
    ],
    'welding_process' => [
        'datas' => $weldingMethods,
        'pattern' => '{ru_short_name}/{en_welding_number}',
        'type' => 'multiple-choice',
    ],
    'welding_position' => [
        'datas' => $weldingPositions,
        'pattern' => '{gost}/{en}',
        'type' => 'multiple-choice'
    ],
    'technology_category' => [
        'filter' => [
            'targetColumn' => 'naks_technology',
            'table' => 'naks_certificates',
            'filterColumn' => 'certificate_no'
        ],
        'pattern' => '{technology_category}',
        'type' => 'select-dropdown'
    ],
    'type_grade_1' => [
        'filter' => [
            'targetColumn' => 'naks_technology',
            'table' => 'naks_certificates',
            'filterColumn' => 'certificate_no'
        ],
        'pattern' => '{technology_category}',
        'type' => 'select-dropdown'
    ],
    'welding_method' => [
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
            'filter_metals_aws_sfa_no_class' => '{aws_class}-{aws_specification}',
            'filter_metals_gost' => '{gost_class}-{gost_specification}'
        ]
    ],
    'current_polarity' => [
        'datas' => $currentTypes,
        'pattern' => '{title}',
        'type' => 'multiple-choice'
    ],
    'joint_design' => [
        'datas' => $jointTypes,
        'pattern' => '{short_name_en}',
        'type' => 'select-dropdown'
    ],
    'base_metal' => [
        'datas' => $workTypes,
        'pattern' => '{title_en}',
        'type' => 'select-dropdown'
    ],
    'pwht_temp_range' => [
        'required' => [
            'column' => 'pwht',
            'value' => 'YES'
        ],
        'type' => 'integer'
    ],
    'pwht_min_time' => [
        'required' => [
            'column' => 'pwht',
            'value' => 'YES'
        ],
        'type' => 'integer'
    ],
    
    
   
];

?>
<?php 
$material_group_test_pieces = db("material_group_test_pieces")->select(
    "incoming_value",
    "provision_value"
    )->get();
    $data = [];
    foreach($material_group_test_pieces AS $piece) {
        $piece->incoming_value = str_replace(",", ".", $piece->incoming_value);
        $data[$piece->incoming_value] = $piece->provision_value;
    }
//dump($data); ?>
<script>
    $(function(){
        var material_group_test_pieces = <?php echo json_encode_tr($data) ?>;
        console.log(material_group_test_pieces);
        $(".naks_technology input").on("blur", function(){
            
        });
        $(".type_grade_1").on("change", function(){
            var group = $(this).attr("data-group");
            var parent = $("." + group);
        
            $( document ).ajaxComplete(function() {
                var value = parent.find(".p_no_from").val();
                parent.find(".qualitication_group_of_parent_material").val(material_group_test_pieces[value]);
                
            });
            
        });


    });
</script>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>