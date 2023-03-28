<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWelderTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welder_tests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('wpq_document_no')->nullable()->default(null);
            $table->string('naks_no')->nullable()->default(null);
            $table->string('name_surname')->nullable()->default(null);
            $table->string('naks_id')->nullable()->default(null);
            $table->string('technology_range')->nullable()->default(null);
            $table->string('material_group_gost')->nullable()->default(null);
            $table->date('naks_validity')->nullable()->default(null);
            $table->string('wps_no')->nullable()->default(null);
            $table->date('welding_date')->nullable()->default(null);
            $table->integer('kss_number')->nullable()->default(null);
            $table->string('material_group_1')->nullable()->default(null);
            $table->string('material_group_2')->nullable()->default(null);
            $table->string('grade_1')->nullable()->default(null);
            $table->string('grade_2')->nullable()->default(null);
            $table->string('joint_type')->nullable()->default(null);
            $table->float('diameter', 255, 2)->nullable()->default(null);
            $table->float('thickness', 255, 2)->nullable()->default(null);
            $table->float('dia_min', 255, 2)->nullable()->default(null);
            $table->float('dia_max', 255, 2)->nullable()->default(null);
            $table->float('thk_min', 255, 2)->nullable()->default(null);
            $table->float('thk_max', 255, 2)->nullable()->default(null);
            $table->string('welding_method')->nullable()->default(null);
            $table->string('coupon_position')->nullable()->default(null);
            $table->string('wire')->nullable()->default(null);
            $table->string('electrode')->nullable()->default(null);
            $table->string('flux')->nullable()->default(null);
            $table->string('shield_gas')->nullable()->default(null);
            $table->string('naks_technology_group')->nullable()->default(null);
            $table->string('evaluated_norm')->nullable()->default(null);
            $table->date('vt_date')->nullable()->default(null);
            $table->string('vt_report_no')->nullable()->default(null);
            $table->string('vt_result')->nullable()->default(null);
            $table->string('pre_heat')->nullable()->default(null);
            $table->date('pwht_date')->nullable()->default(null);
            $table->string('pwht_report_no')->nullable()->default(null);
            $table->string('pwht_operator_name_surname')->nullable()->default(null);
            $table->string('pwht_operator_id')->nullable()->default(null);
            $table->date('ht_date')->nullable()->default(null);
            $table->string('ht_report_no')->nullable()->default(null);
            $table->string('ht_result')->nullable()->default(null);
            $table->date('pt_date')->nullable()->default(null);
            $table->string('pt_report_no')->nullable()->default(null);
            $table->string('pt_result')->nullable()->default(null);
            $table->date('pmi_date')->nullable()->default(null);
            $table->string('pmi_report_no')->nullable()->default(null);
            $table->string('pmi_result')->nullable()->default(null);
            $table->date('rt_date')->nullable()->default(null);
            $table->string('rt_report_no')->nullable()->default(null);
            $table->string('rt_result')->nullable()->default(null);
            $table->date('tensile_date')->nullable()->default(null);
            $table->string('tensile_report_no')->nullable()->default(null);
            $table->string('tensile_result')->nullable()->default(null);
            $table->date('bending_date')->nullable()->default(null);
            $table->string('bending_report_no')->nullable()->default(null);
            $table->string('bending_result')->nullable()->default(null);
            $table->date('impact_date')->nullable()->default(null);
            $table->string('impact_report_no')->nullable()->default(null);
            $table->string('impact_result')->nullable()->default(null);
            $table->date('metallography_date')->nullable()->default(null);
            $table->string('metallography_report_no')->nullable()->default(null);
            $table->string('metallography_result')->nullable()->default(null);
            $table->date('ferrit_date')->nullable()->default(null);
            $table->string('ferrit_report_no')->nullable()->default(null);
            $table->string('ferrit_result')->nullable()->default(null);
            $table->string('intergranullar_corrosion_test_date')->nullable()->default(null);
            $table->string('intergranullar_corrosion_report_no')->nullable()->default(null);
            $table->string('intergranullar_corrosion_result')->nullable()->default(null);
            $table->date('approval_date')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('welder_tests');
    }
}
