<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentFieldsToApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->string('payment_id')
                ->nullable()
                ->default(null)
                ->after('comment');

            $table->string('payment_request_id')
                ->nullable()
                ->default(null)
                ->after('payment_id');

            $table->string('order_number')
                ->nullable()
                ->default(null)
                ->after('payment_request_id');
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
            $table->dropColumn(['payment_id', 'payment_request_id', 'order_number']);
        });
    }
}
