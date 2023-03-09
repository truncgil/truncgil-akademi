<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\NaksCertificate;
use App\Models\WeldingMethod;
use App\Models\WeldingPosition;
use App\Models\Material;
use App\Models\PNumber;
use App\Models\WeldingConsumable;
use App\Models\CurrentType;
use App\Models\JointType;
use App\Models\ProductType;

class CreateProsedureQualificationRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prosedure_qualification_records', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('pqr_no')->nullable()->default(null);
            $table->string('rev_no')->nullable()->default(null);
            $table->foreignIdFor(NaksCertificate::class, 'naks_technology')->nullable()->default(null);
            $table->date('date')->nullable();
            $table->foreignIdFor(WeldingMethod::class, 'welding_process')->nullable()->default(null);
            $table->foreignIdFor(WeldingPosition::class, 'position')->nullable()->default(null);
            $table->foreignIdFor(Material::class, 'type_grade_1')->nullable()->default(null);
            $table->foreignIdFor(Material::class, 'type_grade_2')->nullable()->default(null);
            $table->foreignIdFor(Material::class, 'russian_standart_group_no')->nullable()->default(null);
            $table->foreignIdFor(Material::class, 'russian_standart_group_no_2')->nullable()->default(null);
            $table->foreignIdFor(PNumber::class, 'p_no_to')->nullable()->default(null);
            $table->foreignIdFor(PNumber::class, 'p_no_from')->nullable()->default(null);
            $table->integer('min_outside_diameter')->nullable()->default(null);
            $table->integer('max_outside_diameter')->nullable()->default(null);
            $table->integer('min_thick')->nullable()->default(null);
            $table->integer('max_thick')->nullable()->default(null);
            $table->foreignIdFor(WeldingConsumable::class, 'brend')->nullable()->default(null);
            $table->integer('pre_heating')->nullable()->default(null);
            $table->integer('inter_pass')->nullable()->default(null);
            $table->integer('temp_range')->nullable()->default(null);
            $table->integer('min_time')->nullable()->default(null);
            $table->string('shielding_gas')->nullable()->default(null);
            $table->string('backing_gas')->nullable()->default(null);
            $table->foreignIdFor(CurrentType::class, 'current')->nullable()->default(null);
            $table->foreignIdFor(JointType::class, 'joint_design')->nullable()->default(null);
            $table->foreignIdFor(WorkType::class, 'base_metal')->nullable()->default(null);
            $table->date('approved_date')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prosedure_qualification_records');
    }
}
