<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeldingMachineTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welding_machine_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('code')->nullable();
            $table->string('type')->nullable();
            $table->string('purpose_ru')->nullable();
            $table->string('welding_equipment')->nullable();
            $table->string('purpose_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('welding_machine_types');
    }
}
