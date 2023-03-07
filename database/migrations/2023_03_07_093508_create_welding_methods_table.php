<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeldingMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
        Schema::create('welding_methods', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('en_welding_number')->unique()->nullable();
            $table->string('russian_definition')->nullable();
            $table->string('iso_4063_definition')->nullable();
            $table->string('aws')->nullable();
            $table->string('iso_short_name')->nullable();
            $table->string('aws_short_name')->nullable();
            $table->string('ru_short_name')->nullable();
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('welding_methods');
    }
}
