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
        Schema::create('breakfasts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid', 255);
            $table->string('guest_name', 255);
            $table->string('guest_address', 255);
            $table->string('guest_phone', 255)->nullable();
            $table->foreignId('breakfast_service_id')->nullable(); // ID usluge doručka
            $table->integer('people_amount')->defalut(0);
            $table->date('first_date')->nullable();
            $table->date('last_date')->nullable();
            $table->integer('days')->nullable();
            $table->foreignId('breakfast_location_id')->nullable(); // ID lokacije doručka
            $table->integer('discount')->defalut(0);
            $table->decimal('total_price', 12, 2);
            $table->decimal('paid_amount', 12, 2);
            $table->decimal('rest_to_pay_amount', 12, 2);
            $table->text('note')->nullable();
            $table->foreignId('user_id')->nullable(); // ID usera-agenta
            $table->integer('bike_number')->defalut(0);
            $table->timestamps();

            $table->foreign('breakfast_service_id')
                ->references('id')
                ->on('breakfast_services')
                ->onDelete('set null');
            
            $table->foreign('breakfast_location_id')
                ->references('id')
                ->on('breakfast_locations')
                ->onDelete('set null');
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breakfasts');
    }
};
