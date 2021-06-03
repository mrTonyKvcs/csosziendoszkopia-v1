<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMinutesAndPriceFieldsToDoctorMedicalExaminationPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctor_medical_examination', function (Blueprint $table) {
            $table->integer('minutes')->after('medical_examination_id');
            $table->integer('price')->after('minutes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor_medical_examination', function (Blueprint $table) {
            $table->dropColumn(['minutes', 'price']);
        });
    }
}
