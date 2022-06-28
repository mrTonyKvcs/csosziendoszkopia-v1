<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullableToApplicantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->integer('zip')->default(null)->after('phone')->nullable()->change();
            $table->string('city')->default(null)->after('zip')->nullable()->change();
            $table->string('street')->default(null)->after('city')->nullable()->change();
            $table->string('social_security_number')
                ->after('phone')
                ->nullable()
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->integer('zip')->default(null)->after('phone')->change();
            $table->string('city')->default(null)->after('zip')->change();
            $table->string('street')->default(null)->after('city')->change();
            $table->string('social_security_number')
                ->after('phone')
                ->change();
        });
    }
}
