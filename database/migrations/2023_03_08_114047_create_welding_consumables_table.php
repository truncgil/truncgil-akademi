<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeldingConsumablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welding_consumables', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('company')->nullable();
            $table->string('brend')->nullable();
            $table->string('en_class')->nullable();
            $table->string('en_specification')->nullable();
            $table->string('aws_class')->nullable();
            $table->string('aws_specification')->nullable();
            $table->string('gost_class')->nullable();
            $table->string('gost_specification')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('welding_consumables');
    }
}
