<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterOfExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_of_experts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('location')->nullable()->default(null);
            $table->string('surname_ru')->nullable()->default(null);
            $table->string('firstname_ru')->nullable()->default(null);
            $table->string('surname_en')->nullable()->default(null);
            $table->string('firstname_en')->nullable()->default(null);
            $table->date('date_of_birth')->nullable()->default(null);
            $table->string('certificate_no')->nullable()->default(null);
            $table->string('welding_specialist_level')->nullable()->default(null);
            $table->string('groups_of_technical_devices')->nullable()->default(null);
            $table->date('date_of_attestation')->nullable()->default(null);
            $table->date('expration_of_the_certificate')->nullable()->default(null);
            $table->string('permit_no')->nullable()->default(null);
            $table->date('permit_date')->nullable()->default(null);
            $table->string('comments')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register_of_experts');
    }
}
