<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialGroupTestPiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_group_test_pieces', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('incoming_value')->nullable()->default(null);
            $table->string('provision_value')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_group_test_pieces');
    }
}
