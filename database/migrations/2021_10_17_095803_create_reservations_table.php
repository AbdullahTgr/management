<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id')->nullable();
            $table->integer('triptype_id')->nullable();
            $table->integer('destination_id')->nullable();
            $table->string('view_id')->nullable();
            $table->string('included_id')->nullable();
            $table->integer('sales_agent_id')->nullable();
            $table->integer('res_agent_id')->nullable();

            $table->timestamps();
            $table->date('date')->nullable();
            $table->string('clint_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('adults')->nullable();
            $table->string('kids')->nullable();
            $table->string('kids_age')->nullable();
            $table->string('days_night')->nullable();
            $table->string('month')->nullable();
            $table->string('checkin')->nullable();
            $table->string('checkout')->nullable();
            $table->string('transportations')->nullable();
            $table->string('excursion')->nullable();
            $table->string('gateway')->nullable();
            $table->string('salescomments')->nullable();
            $table->date('received_time')->nullable();
            $table->date('response_time')->nullable();
            $table->string('avaliability')->nullable();
            $table->string('confirmation')->nullable();
            $table->string('res_comment')->nullable();
            $table->datetime('payment_option_date')->nullable();
//  Room Details
            $table->string('chalet')->nullable();
            $table->string('single')->nullable();
            $table->string('double')->nullable();
            $table->string('triple')->nullable();
            $table->string('transportation')->nullable();
            $table->string('kidscharge')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
