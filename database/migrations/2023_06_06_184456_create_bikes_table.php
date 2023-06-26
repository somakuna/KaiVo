<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->string('guest_name', 255);
            $table->string('guest_address', 255);
            $table->string('guest_phone', 255)->nullable();
            $table->foreignId('bike_service_id')->nullable(); //ID usluge bicikla
            $table->integer('bikes_amount')->default(0);
            $table->datetime('pickup_datetime')->nullable();
            $table->datetime('return_datetime')->nullable();
            $table->integer('delivery')->default(0);
            $table->integer('baby_seat')->default(0);
            $table->integer('discount')->default(0);
            $table->decimal('total_price', 12, 2);
            $table->decimal('paid_amount', 12, 2);
            $table->decimal('rest_to_pay_amount', 12, 2);
            $table->text('note')->nullable();
            $table->foreignId('user_id')->nullable(); //ID usera-agenta
            $table->string('uuid', 255);
            $table->timestamps();

            $table->foreign('bike_service_id')
                ->references('id')
                ->on('bike_services')
                ->onDelete('restrict');
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bikes');
    }
};
