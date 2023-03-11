<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNaksWeldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naks_welders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('welder_name_ru')->nullable()->default(null);
            $table->string('welder_name_en')->nullable()->default(null);
            $table->date('year_of_birth')->nullable()->default(null);
            $table->string('qualitification_category')->nullable()->default(null);
            $table->string('work_experience')->nullable()->default(null);
            $table->string('welder_id')->nullable()->default(null);
            $table->string('process')->nullable()->default(null);
            $table->string('component')->nullable()->default(null);
            $table->string('weld_type')->nullable()->default(null);
            $table->string('naks_certificate_no')->nullable()->default(null);
            $table->string('period_of_validity')->nullable()->default(null);
            $table->string('group_of_technical_device')->nullable()->default(null);
            $table->string('material')->nullable()->default(null);
            $table->float('diameter_min', 255, 2)->nullable()->default(null);
            $table->float('diameter_max', 255, 2)->nullable()->default(null);
            $table->float('min_thick', 255, 2)->nullable()->default(null);
            $table->float('max_thick', 255, 2)->nullable()->default(null);
            $table->float('diameter_min_2', 255, 2)->nullable()->default(null);
            $table->float('diameter_max_2', 255, 2)->nullable()->default(null);
            $table->float('min_thick_2', 255, 2)->nullable()->default(null);
            $table->float('max_thick_2', 255, 2)->nullable()->default(null);
            $table->string('welding_position')->nullable()->default(null);
            $table->string('company')->nullable()->default(null);
            $table->string('order_no')->nullable()->default(null);
            $table->date('date')->nullable()->default(null);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('naks_welders');
    }
}
