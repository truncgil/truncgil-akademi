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
            $table->string('certificate_no')->nullable();
            $table->string('short_name')->nullable()->default(null);
            $table->date('valid_from')->nullable()->default(null);
            $table->date('valid_to')->nullable()->default(null);
            $table->string('welding_method')->nullable();
            $table->string('mat_group_1')->nullable();
            $table->string('mat_group_2')->nullable();
            $table->string('consumable')->nullable();
            $table->string('technology_category')->nullable();
            $table->string('type')->nullable();
            $table->string('min')->nullable();
            $table->string('max')->nullable();
            $table->string('min2')->nullable();
            $table->string('max2')->nullable();
            $table->string('min_thick')->nullable();
            $table->string('max_thick')->nullable();
            $table->string('min_thick2')->nullable();
            $table->string('max_thick2')->nullable();
            $table->string('join_type')->nullable();
            $table->string('pwth')->nullable();
            $table->string('connection_type')->nullable();
            $table->string('join_view')->nullable();
            $table->string('angle_type')->nullable();
            $table->string('position')->nullable();
            $table->string('pre_heating')->nullable();
            $table->string('shielding_gas')->nullable();
            $table->string('electrode_coating')->nullable();
            $table->string('welding_equipment')->nullable();
            $table->string('performed_works_type')->nullable();
            $table->string('apparatus')->nullable();
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
