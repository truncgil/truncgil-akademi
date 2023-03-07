<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('steel_grade')->nullable();
            $table->string('short_name')->nullable();
            $table->string('product_name')->nullable();
            $table->string('ru_group')->nullable();
            $table->string('iso')->nullable();
            $table->string('asme_number')->nullable();
            $table->string('carbon')->nullable();
            $table->string('silicon')->nullable();
            $table->string('manganese')->nullable();
            $table->string('phosphorus')->nullable();
            $table->string('sulfur')->nullable();
            $table->string('chromium')->nullable();
            $table->string('nickel')->nullable();
            $table->string('molybdenum')->nullable();
            $table->string('copper')->nullable();
            $table->string('aluminium')->nullable();
            $table->string('titanium')->nullable();
            $table->string('vanadium')->nullable();
            $table->string('tungsten')->nullable();
            $table->string('columbium')->nullable();
            $table->string('tensile_strength')->nullable();
            $table->string('yield_point')->nullable();
            $table->string('elongation')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
