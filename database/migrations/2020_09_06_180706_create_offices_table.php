<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name')->unique();
            $table->string('address');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('consultations', function (Blueprint $table) {
            $table->bigInteger('office_id')
                ->default(1)
                ->nullable()
                ->after('user_id');

            $table->boolean('is_digital')
                ->default(false)
                ->after('close');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offices');

        Schema::table('consultations', function (Blueprint $table) {
            $table->dropColumn(['office_id', 'is_digital']);
        });
    }
}
