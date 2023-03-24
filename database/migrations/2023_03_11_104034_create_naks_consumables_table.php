<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNaksConsumablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naks_consumables', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type_of_consumable')->nullable()->default(null);
            $table->string('brand')->nullable()->default(null);
            $table->string('product_name')->nullable()->default(null);
            $table->string('aws_classification')->nullable()->default(null);
            $table->float('diameter', 255, 2)->nullable()->default(null);
            $table->string('group_of_base_material')->nullable()->default(null);
            $table->string('base_material')->nullable()->default(null);
            $table->integer('qty')->nullable()->default(null);
            $table->integer('unit')->nullable()->default(null);
            $table->string('batch_number')->nullable()->default(null);
            $table->string('naks_certificate_no')->nullable()->default(null);
            $table->date('naks_certificate_date')->nullable()->default(null);
            $table->date('naks_valid_date')->nullable()->default(null);
            $table->string('naks_tech_group')->nullable()->default(null);            
            $table->string('inspection_test_report')->nullable()->default(null);            
            $table->string('inspection_certificate_standart')->nullable()->default(null);            
            $table->string('certification_date')->nullable()->default(null);            
            $table->float('certification_qty', 255, 2)->nullable()->default(null);            
            $table->string('icm_inspection_status')->nullable()->default(null);            
            $table->string('icm_rfi_no')->nullable()->default(null);            
            $table->string('icm_akt_no')->nullable()->default(null);            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('naks_consumables');
    }
}
