<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeldingEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welding_equipment', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('location')->nullable()->default(null);
            $table->string('attestation')->nullable()->default(null);
            $table->string('producer')->nullable()->default(null);
            $table->string('type_of_welding_machine')->nullable()->default(null);
            $table->string('brand')->nullable()->default(null);
            $table->string('manufacturer_code')->nullable()->default(null);
            $table->string('type_of_weld')->nullable()->default(null);
            $table->string('groups_of_technical_devices')->nullable()->default(null);
            $table->date('date_of_issue')->nullable()->default(null);
            $table->date('valid_until')->nullable()->default(null);
            $table->string('working_status')->nullable()->default(null);
            $table->string('remarks')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('welding_equipment');
    }
}
