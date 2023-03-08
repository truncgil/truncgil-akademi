<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHazardClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hazard_classes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('serial_number')->unique()->nullable();
            $table->string('category_serial_number')->nullable();
            $table->string('category_title_en')->nullable();
            $table->string('category_title_tr')->nullable();
            $table->string('category_title_ru')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_tr')->nullable();
            $table->string('title_ru')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hazard_classes');
    }
}
