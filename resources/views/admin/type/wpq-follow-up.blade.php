<?php 

use App\Models\WelderTest; 

$title = "Naks Welder";
$tableWidth="800%";
$path = "admin.type.wpq-follow-up";
$listDatas = WelderTest::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "welder_tests";
$naksWelders = db("naks_welders")->get();
$materials = db("materials")->whereNotIn("ru_group", ['*'])->groupBy("ru_group")->get();
$wps = db("w_p_s")->get();
$welderTests = db("welder_tests")->get();
$jointTypes = db("joint_types")->get();
$weldingConsumables = db("welding_consumables")->get();
$weldingMethods = db("welding_methods")->get();
$hazardClasses = db("hazard_classes")->get();

$blockGroup = [
    'General Information' => [
        'wpq_document_no',
        'naks_no',
        'name_surname',
        'naks_id',
        'technology_range',
        'material_group_gost',
        'wps_no',
        'welding_date',
        'kss_number',
        'material_group_1',
        'material_group_2',
        'grade_1',
        'grade_2',
        'joint_type',
        'diameter',
        'dia_min',
        'dia_max',
        'thk_min',
        'thk_max',
        'welding_method',
        'wire',
        'electrode',
        'flux',
        'shield_gas',
        'naks_technology_group',
        'evaluated_norm',
        'approval_date',
        'status',
    ],
    'VT' => [
        'vt_date',
        'vt_report_no',
        'vt_result',
    ],
    'HT' => [
        'ht_date',
        'ht_report_no',
        'ht_result',
    ],
    'PT' => [
        'pt_date',
        'pt_report_no',
        'pt_result',
    ],
    'PMI' => [
        'pmi_date',
        'pmi_report_no',
        'pwht_operator_name_surname',
        'pwht_operator_id',
    ],
    'RT' => [
        'rt_date',
        'rt_report_no',
        'rt_result',
    ],
    'Tensile' => [
        'tensile_date',
        'tensile_report_no',
        'tensile_result',
    ],
    'Bending' => [
        'bending_date',
        'bending_report_no',
        'bending_result',
    ],
    'Impact' => [
        'impact_date',
        'impact_report_no',
        'impact_result',
    ],
    'Metallography' => [
        'metallography_date',
        'metallography_report_no',
        'metallography_result',
    ],
    'Ferrit' => [
        'ferrit_date',
        'ferrit_report_no',
        'ferrit_result',
    ],
    'Corrosion' => [
        'intergranullar_corrosion_test_date',
        'intergranullar_corrosion_report_no',
        'intergranullar_corrosion_result',
    ],

];

$relationDatas = [
    'naks_no' => [
        'table' => 'naks_welders',
        'datas' => $naksWelders,
        'value' => 'naks_certificate_no',
        'text' => ['naks_certificate_no'],
        'type' => 'select',
        'affected' => [
            'name_surname' => '{welder_name_ru}',
            'naks_id' => '{welder_id}',
            'technology_range' => '{group_of_technical_device}',
            'material_group_gost' => '{material}',
            'naks_validity' => '{period_of_validity}',
            'joint_type' => '{weld_type}',
            'welding_method' => '{process}',
        ],
        
    ],
    'wps_no' => [
        'table' => 'w_p_s',
        'datas' => $wps,
        'value' => 'id',
        'text' => ['id'],
        'type' => 'select',
        'affected' => [
            'welding_date' => '{date}',
        ]
    ],
    
    'material_group_1' => [
        'datas' => $materials,
        'pattern' => '{ru_group}',
        'type' => 'select-dropdown',
        'filter-columns' => ['grade_1']
    ],
    'material_group_2' => [
        'datas' => $materials,
        'pattern' => '{ru_group}',
        'type' => 'select-dropdown',
        'filter-columns' => ['grade_2']
    ],
    'grade_1' => [
        'datas' => $materials,
        'pattern' => '{steel_grade}',
        'type' => 'multiple-choice'
    ],
    'grade_2' => [
        'datas' => $materials,
        'pattern' => '{steel_grade}',
        'type' => 'multiple-choice'
    ],
    'joint_type' => [
        'datas' => $naksWelders,
        'pattern' => '{weld_type}',
        'type' => 'select-dropdown'
    ],
    'welding_method' => [
        'datas' => $weldingMethods,
        'pattern' => '{ru_short_name} + {en_welding_number}',
        'type' => 'multiple-choice',
        'seperator' => ' + ',
    ],
    'wire' => [
        'datas' => $weldingConsumables,
        'pattern' => '{brend}',
        'type' => 'select-dropdown'
    ],
    'electrode' => [
        'datas' => $weldingConsumables,
        'pattern' => '{brend}',
        'type' => 'select-dropdown'
    ],
    'flux' => [
        'datas' => $weldingConsumables,
        'pattern' => '{brend}',
        'type' => 'select-dropdown'
    ],
    'shielding_gas' => [
        'datas' => $weldingConsumables,
        'pattern' => '{brend}',
        'type' => 'select-dropdown'
    ],
    'naks_technology_group' => [
        'datas' => $hazardClasses,
        'pattern' => '{serial_number}',
        'type' => 'multiple-choice'
    ],


];

?>
<script>
    $(function(){
        var type_grade_json;


        $(".vt,.ht,.pt,.pmi,.rt,.tensile,.bending,.impact,.metallography,.ferrit").removeClass("col-12").addClass("col-md-6");
        $("#vt,#ht,#pt,#pmi,#rt,#tensile,#bending,#impact,#metallography,#ferrit,#corrosion").addClass("border").addClass("bg-white");

        $(".joint_type .dropdown-item").on("click", function(){
            var parent = $(this).parent().parent().parent().parent();
            var dataGroup = parent.attr("data-group");
            var json = JSON.parse($(this).attr("data-filter-value"));
            var dataGroupParent = $("." + dataGroup);

            console.log(json);

            dataGroupParent.find(".diameter")
                .attr("min",json.diameter_min)
                .attr("max",json.diameter_max)
                .attr("required", true);

            dataGroupParent.find(".thickness")
                .attr("min",json.min_thick)
                .attr("max",json.max_thick)
                .attr("required", true);
        });

        

        $(".grade_1 .dropdown-item").on("click", function() {
            type_grade_json = JSON.parse($(this).attr("data-filter-value"));
            console.log(type_grade_json);
        });

        $(".diameter").on("change", function() {
            console.log(type_grade_json);
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
                parent.find(".dia_min").val(min).prop("readonly",true);
                parent.find(".dia_max").val(max).prop("readonly",true);

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

                parent.find(".thk_min").val(min).prop("readonly",true);
                parent.find(".thk_max").val(max).prop("readonly",true);
            }

            

        });
    });
</script>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>