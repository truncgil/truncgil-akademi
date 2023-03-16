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
            $table->string('group_of_technical_devices')->nullable()->default(null);
            $table->string('welding_process_method')->nullable()->default(null);
            $table->string('joint_type')->nullable()->default(null);
            $table->string('ru_joint_geometry')->nullable()->default(null);
            $table->string('welding_position')->nullable()->default(null);
            $table->string('type_grade')->nullable()->default(null);
            $table->string('russian_standard_group_no_1')->nullable()->default(null);
            $table->string('russian_standard_group_no_2')->nullable()->default(null);
            $table->integer('p_no_from')->nullable()->default(null);
            $table->integer('p_no_to')->nullable()->default(null);
            $table->integer('min_outside_diameter')->nullable()->default(null);
            $table->integer('max_outside_diameter')->nullable()->default(null);
            $table->float('min_thick',2,2)->nullable()->default(null);
            $table->float('max_thick',2,2)->nullable()->default(null);
            $table->string('sfa_no')->nullable()->default(null);
            $table->string('gost')->nullable()->default(null);
            $table->string('pre_heating_min')->nullable()->default(null);
            $table->string('inter_pass_max')->nullable()->default(null);
            $table->string('temp_range')->nullable()->default(null);
            $table->string('min_time')->nullable()->default(null);
            $table->string('shielding_gas')->nullable()->default(null);
            $table->string('backing_gas')->nullable()->default(null);
            $table->string('current_polarity')->nullable()->default(null);
            $table->string('base_material')->nullable()->default(null);
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
