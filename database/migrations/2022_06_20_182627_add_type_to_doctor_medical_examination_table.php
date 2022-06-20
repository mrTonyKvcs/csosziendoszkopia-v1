<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToDoctorMedicalExaminationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctor_medical_examination', function (Blueprint $table) {
            $table->integer('type')->after('medical_examination_id')->default(1);
        });
        Schema::table('medical_examinations', function (Blueprint $table) {
            $table->dropColumn('type_id');
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
            $table->dropColumn('type');
        });

        Schema::table('medical_examinations', function (Blueprint $table) {
            $table->bigInteger('type_id')->default(1)->after('id');
        });
    }
}
