<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderDetail', function (Blueprint $table) {
            $table->increments('ord_detail_id');
            $table->string('code','45');
            $table->string('name','200');
            $table->integer('price');
            $table->integer('quantity');
            $table->string('image','255');
            $table->integer('ord_id')->unsigned();
            $table->foreign('ord_id')->references('ord_id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('orderDetail');
    }
}
