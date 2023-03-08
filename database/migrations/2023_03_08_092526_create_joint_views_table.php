<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJointViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joint_views', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('definition_ru')->nullable();
            $table->string('short_name_ru')->nullable();
            $table->string('short_name_en')->nullable();
            $table->string('definition_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joint_views');
    }
}
