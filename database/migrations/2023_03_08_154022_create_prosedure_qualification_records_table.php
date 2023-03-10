<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\NaksCertificate;
use App\Models\WeldingMethod;
use App\Models\WeldingPosition;
use App\Models\Material;
use App\Models\PNumber;
use App\Models\WeldingConsumable;
use App\Models\CurrentType;
use App\Models\JointType;
use App\Models\ProductType;

class CreateProsedureQualificationRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prosedure_qualification_records', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('pqr_no')->nullable()->default(null);
            $table->string('rev_no')->nullable()->default(null);
            $table->string('naks_technology')->nullable()->default(null);
            $table->string('technology_category')->nullable()->default(null);
            $table->string('pwps_no')->nullable()->default(null);
            $table->string('base_metal')->nullable()->default(null);
            $table->date('date')->nullable();
            $table->string('welding_method')->nullable()->default(null);
            $table->string('position')->nullable()->default(null);
            $table->string('type_grade_1')->nullable()->default(null);
            $table->string('type_grade_2')->nullable()->default(null);
            $table->string('russian_standart_group_no')->nullable()->default(null);
            $table->string('russian_standart_group_no_2')->nullable()->default(null);
            $table->integer('p_no_to')->nullable()->default(null);
            $table->integer('p_no_from')->nullable()->default(null);
            $table->float('outside_diameter', 3, 2)->nullable()->default(null);
            $table->float('thickness', 3, 2)->nullable()->default(null);
            $table->string('brend')->nullable()->default(null);
            $table->string('aws_sfa_no_class')->nullable()->default(null);
            $table->string('gost')->nullable()->default(null);
            $table->integer('pre_heating')->nullable()->default(null);
            $table->integer('inter_pass')->nullable()->default(null);
            $table->integer('temp_range')->nullable()->default(null);
            $table->integer('min_time')->nullable()->default(null);
            $table->string('shielding_gas')->nullable()->default(null);
            $table->string('backing_gas')->nullable()->default(null);
            $table->string('current_polarity')->nullable()->default(null);
            $table->string('joint_design')->nullable()->default(null);
            $table->string('work_type')->nullable()->default(null);
            $table->string('group_of_parent_material')->nullable()->default(null);
            $table->float('outside_daimeter_min', 2, 2)->nullable()->default(null);
            $table->float('outside_daimeter_max', 2, 2)->nullable()->default(null);
            $table->float('thickness_min', 2, 2)->nullable()->default(null);
            $table->string('process')->nullable()->default(null);
            $table->string('pre_heating_2')->nullable()->default(null);
            $table->string('pwht')->nullable()->default(null);
            $table->string('range_position')->nullable()->default(null);
            $table->string('type_of_joint')->nullable()->default(null);  
            $table->string('backing_gas_2')->nullable()->default(null);  
            $table->date('approved_date')->nullable()->default(null);
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
        Schema::dropIfExists('prosedure_qualification_records');
    }
}
