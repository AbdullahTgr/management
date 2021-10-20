<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('agent_id')->nullable();
            $table->integer('hotel_id')->nullable();
            $table->string('client_name')->nullable();
            $table->string('days_nights')->nullable();
            $table->integer('checkin')->nullable();
            $table->integer('transportation_id')->nullable();
            $table->integer('excursion_id')->nullable();
            $table->float('cashin')->nullable();
            $table->float('cashout')->nullable();
            $table->integer('bank_id')->nullable();
            $table->text('notes')->nullable();
            $table->float('commission')->nullable();
            $table->integer('res_id')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finances');
    }
}
