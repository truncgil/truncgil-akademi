<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\NaksCenter;

class CreateNaksCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naks_certificates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('short_number')->nullable()->default(null);
            $table->string('certificate_no')->nullable();
            $table->string('short_name')->nullable()->default(null);
            $table->date('valid_from')->nullable()->default(null);
            $table->date('valid_to')->nullable()->default(null);
            $table->string('welding_method')->nullable();
            $table->string('mat_group_1')->nullable();
            $table->string('mat_group_2')->nullable();
            $table->string('welding_consumable')->nullable();
            $table->string('technology_category')->nullable();
            $table->string('work_type')->nullable();
            $table->float('min_dia', 255, 2)->nullable();
            $table->float('max_dia', 255, 2)->nullable();
            $table->float('min_dia2', 255, 2)->nullable();
            $table->float('max_dia2', 255, 2)->nullable();
            $table->float('min_thick', 255, 2)->nullable();
            $table->float('max_thick', 255, 2)->nullable();
            $table->float('min_thick2', 255, 2)->nullable();
            $table->float('max_thick2', 255, 2)->nullable();
            $table->string('joint_type')->nullable();
            $table->string('pwht')->nullable();
            $table->string('connection_type')->nullable();
            $table->string('joint_view')->nullable();
            $table->string('angle_type')->nullable();
            $table->string('position')->nullable();
            $table->string('pre_heating')->nullable();
            $table->string('shielding_gas')->nullable();
            $table->string('electrode_coating')->nullable();
            $table->string('welding_equipment')->nullable();
            $table->string('performed_works_type')->nullable();
            $table->string('remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('naks_certificates');
    }
}
