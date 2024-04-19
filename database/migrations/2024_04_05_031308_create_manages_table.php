<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_info', function (Blueprint $table) {
            $table->id();
            $table->string('hid');
            $table->string('open_time')->nullable();
            $table->string('close_time')->nullable();
            $table->boolean('allday_active');
            $table->string('explain_text_ja','255')->nullable();
            $table->string('explain_text_en','255')->nullable();
            $table->string('order_text_ja','255')->nullable();
            $table->string('order_text_en','255')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_info');
    }
}
