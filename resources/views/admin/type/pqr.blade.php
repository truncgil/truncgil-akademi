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
$naksTechnology = db('naks_certificates')->groupBy("certificate_no")->get();
$workTypes = db('work_types')->get();

$blockGroup = [
    'PQR Info' => [
        'pqr_no',
        'rev_no',
        'naks_technology',
        'technology_category',
        'pwps_no',
        'base_metal_used_for_pqr_coupon',
        'date',
        'welding_process',
        'welding_position',
        
    ],
    'Base Material' => [
        'type_grade_1',
        'type_grade_2',
        'russian_standart_group_no',
        'russian_standart_group_no_2',
        'p_no_to',
        'p_no_from',
        'outside_diameter',
        'thickness',
        'brend',
        'filter_metals_aws_sfa_no_class',
        'filter_metals_gost',
        'pre_heating_min',
        'inter_pass_max',
        'pwht_temp_range',
        'pwht_min_time',
        'shielding_gas',
        'backing_gas',
        'current_polarity',
        'joint_design',
        'base_metal',
        
    ],
    
    'Qualitification Range' => [
        'qualitication_outside_diameter_min',
        'qualitication_outside_diameter_max',
        'thickness_min',
        'thickness_max',
        'qualitication_group_of_parent_material',
    ],
    'Result' => [
        'qualitication_process',
        'pre_heating',
        'qualitication_pwht',
        'qualitication_type_of_joint',
        'qualitication_backing_gas',
        'approved_date',
        'status',
    ],
];


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
    /*
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
    */
    'brend' => [
        'datas' => $weldingConsumables,
        'pattern' => '{brend}',
        'type' => 'multiple-choice',
        'seperator' => ' + '
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
 ?>
<script>
    $(function(){
        var material_group_test_pieces = <?php echo json_encode_tr($data) ?>;
        var type_grade_json = [];

        $(".naks_technology input").on("blur", function(){
            
        });
        $(".type_grade_1").on("change", function( ){
           
            var group = $(this).attr("data-group");
            var parent = $("." + group);
        
            $( document ).ajaxComplete(function(event, xhr, settings) {
                type_grade_json = xhr.responseJSON;
                var value = parent.find(".p_no_from").val();
                parent.find(".qualitication_group_of_parent_material").val(material_group_test_pieces[value]);
                
            });
            
        });

        $(".outside_diameter").on("change", function() {
            if(type_grade_json.short_name !== undefined) {
                var group = $(this).attr("data-group");
                var parent = $("." + group);
                var value = $(this).val();
                var material_type  = "Steel";
                var min;
                var max;

                if(['AS', 'SS', 'CS'].includes(type_grade_json.short_name)) {
                    material_type = "Steel";
                    if(value<=25) {
                        min = value;
                        max = value * 2;
                    }

                    if(value>25 && value<= 150) {
                        min = 0.5 * value;
                        max = value * 2;
                    }

                    if(value>150) {
                        min = 0.5 * value;
                        max = "";
                    }
                }

                if(type_grade_json.short_name == "NI") {
                    material_type = "Nickel";

                    if(value<=25) {
                        min = value;
                        max = value * 2;
                    }

                    if(value>25 && value<= 150) {
                        min = 0.5 * value;
                        max = value * 2;
                    }

                    if(value>150) {
                        min = 0.5 * value;
                        max = "";
                    }
                }

                if(type_grade_json.short_name == "AL") {
                    material_type = "Aluminium";

                    if(value<=125) {
                        min = value * 0.5;
                        max = value * 2.5;
                    }

                    if(value>125) {
                        min = 0.5 * value;
                        max = 2.5 * value;
                    }

                    
                }
                parent.find(".qualitication_outside_diameter_min").val(min).prop("readonly",true);
                parent.find(".qualitication_outside_diameter_max").val(max).prop("readonly",true);

            }
            
            
        });

        $(".thickness").on("change", function() {

            if(type_grade_json.short_name !== undefined) {
                var group = $(this).attr("data-group");
                var parent = $("." + group);
                var value = $(this).val();
                var material_type  = "Steel";
                var min;
                var max;

                if(['AS', 'SS', 'CS'].includes(type_grade_json.short_name)) {
                    material_type = "Steel";
                    if(value<=3) {
                        min = value;
                        max = value * 2;
                    }

                    if(value>3 && value<= 12) {
                        min = 3;
                        max = value * 2;
                    }

                    if(value>12) {
                        min = 5;
                        max = "";
                    }
                }

                if(type_grade_json.short_name == "NI") {
                    material_type = "Nickel";

                    if(value<=3) {
                        min = value;
                        max = value * 2;
                    }

                    if(value>3 && value<= 12) {
                        min = 3;
                        max = value * 2;
                    }

                    if(value>12) {
                        min = 5;
                        max = "";
                    }
                }

                if(type_grade_json.short_name == "AL") {
                    material_type = "Aluminium";

                    if(value<=6) {
                        min = value * 0.7;
                        max = value * 2.5;
                    }

                    if(value>6 && value<= 15) {
                        min = 6;
                        max = 40;
                    }

                    
                }

                parent.find(".thickness_min").val(min).prop("readonly",true);
                parent.find(".thickness_max").val(max).prop("readonly",true);
            }

            

        });
        $(".welding_process .dropdown-item input:checkbox").on("click", function(){
            var parent = $(this).parent().parent().parent().parent();
            var dataGroup = parent.attr("data-group");
            var dataGroupParent = $("." + dataGroup);
            var checkboxChecked = parent.find("input:checked").parent();
            var selectedNumbers = [];
            $.each(checkboxChecked, function(index, item) {
                var json = JSON.parse($(this).attr("data-filter-value"));
                selectedNumbers.push(json.en_welding_number);
            });
            dataGroupParent.find(".qualitication_process").val(selectedNumbers.join(" + "));
        });

       $(".naks_technology .dropdown-item input:checkbox").on("click", function() {
            var parent = $(this).parent().parent().parent().parent();
            var dataGroup = parent.attr("data-group");
            var dataGroupParent = $("." + dataGroup);
            var checkboxChecked = parent.find("input:checked").parent();

            var baseMetalUsedForPQRCoupon = ".base_metal_used_for_pqr_coupon .dropdown-item"; 
            var weldingProcess = ".welding_process .dropdown-item"; 
            var brend = ".brend .dropdown-item"; 
            var baseMetal = ".base_metal .dropdown-item"; 

            dataGroupParent.find(baseMetalUsedForPQRCoupon).addClass("d-none");
            dataGroupParent.find(weldingProcess).addClass("d-none");
            dataGroupParent.find(brend).addClass("d-none");
            
            $.each(checkboxChecked, function(index, item) {
                var json = JSON.parse($(this).attr("data-filter-value"));
                var mathGroup = json.mat_group_1.split("-");
                var weldingConsumables = json.welding_consumable.split(",");
                var workType = json.work_type;

                $.each(weldingConsumables, function(weldingIndex, weldingItem) {
                    dataGroupParent.find(brend +":contains('"+weldingItem+"')").removeClass("d-none");
                });

                dataGroupParent.find(baseMetal).filter(function(){
                    $(this).toggle($(this).text().trim() == workType);
                });

                dataGroupParent.find(baseMetalUsedForPQRCoupon +"[data-filter-value*='"+mathGroup[0]+"']").removeClass("d-none");
                
                dataGroupParent.find(weldingProcess +"[data-filter-value*='"+json.welding_method+"']").removeClass("d-none");
            });
       });
  //     $(".pqr-info").removeClass("col-12").addClass("col-md-6");
  //     $(".base-material").removeClass("col-12").addClass("col-md-6");
       $("#pqr-info").addClass("border").addClass("bg-white");
       $("#qualitification-range").addClass("border").addClass("bg-light");
       $("#base-material").addClass("border").addClass("bg-white");
       $("#result").addClass("border").addClass("bg-white");

       $("#pqr-info .block-header").addClass("bg-gd-sea");
       $("#qualitification-range .block-header").addClass("bg-gd-sun");
       $("#base-material .block-header").addClass("bg-gd-leaf");
       $("#result .block-header").addClass("bg-gd-emerald");


    });
</script>
<style>
   
</style>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>