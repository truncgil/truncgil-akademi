<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('w_p_s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type')->nullable()->default(null);
            $table->string('details')->nullable()->default(null);
            $table->string('rev_no')->nullable()->default(null);
            $table->string('pqr_no')->nullable()->default(null);
            $table->date('date')->nullable()->default(null);
            $table->string('naks_certificate_no')->nullable()->default(null);
            $table->string('technology_category')->nullable()->default(null);
            $table->string('welding_process')->nullable()->default(null);
            $table->string('joint_type')->nullable()->default(null);
            $table->string('joint_type_ru')->nullable()->default(null);
            $table->string('welding_position')->nullable()->default(null);
            $table->string('material_type_grade')->nullable()->default(null);
            $table->string('russian_standard_group_no_1')->nullable()->default(null);
            $table->string('russian_standard_group_no_2')->nullable()->default(null);
            $table->integer('p_no_from')->nullable()->default(null);
            $table->integer('p_no_to')->nullable()->default(null);
            $table->integer('min_outside_diameter')->nullable()->default(null);
            $table->integer('max_outside_diameter')->nullable()->default(null);
            $table->float('min_thick',2,2)->nullable()->default(null);
            $table->float('max_thick',2,2)->nullable()->default(null);
            $table->string('filler_metals_sfa_no')->nullable()->default(null);
            $table->string('filler_metals_gost')->nullable()->default(null);
            $table->string('pre_heating_min')->nullable()->default(null);
            $table->string('inter_pass_max')->nullable()->default(null);
            $table->string('pwht_temp_range')->nullable()->default(null);
            $table->string('pwht_min_time')->nullable()->default(null);
            $table->string('shielding_gas')->nullable()->default(null);
            $table->string('backing_gas')->nullable()->default(null);
            $table->string('current_polarity')->nullable()->default(null);
            $table->string('joint_type_definition')->nullable()->default(null);
            $table->string('work_type')->nullable()->default(null);
            $table->string('remarks')->nullable()->default(null);
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
        Schema::dropIfExists('w_p_s');
    }
}
