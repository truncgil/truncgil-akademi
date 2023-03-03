<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\NaksCenter;

class CreateNaksCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naks_certificates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(NaksCenter::class);
            $table->date('valid_from');
            $table->date('valid_to');
            $table->string('welding_method');
            $table->string('mat_group_1');
            $table->string('mat_group_2');
            $table->string('technology_category');
            $table->string('type');
            $table->string('min_dia');
            $table->string('max_dia');
            $table->string('min_dia2');
            $table->string('max_dia2');
            $table->string('min_thick');
            $table->string('max_thick2');
            $table->string('join_type');
            $table->enum('pwth', ['YES', 'NO']);
            $table->string('connection_type');
            $table->string('join_view');
            $table->string('angle_type');
            $table->string('position');
            $table->string('pre_heating');
            $table->string('apparatus');
            $table->string('remarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('naks_certificates');
    }
}
