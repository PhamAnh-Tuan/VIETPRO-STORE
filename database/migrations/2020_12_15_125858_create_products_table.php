<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('prd_id');
            $table->string('prd_name','255');
            $table->string('prd_code','45');
            $table->string('prd_slug','255');
            $table->decimal('prd_price','18');
            $table->tinyInteger('prd_featured');
            $table->tinyInteger('prd_state');
            $table->text('prd_info');
            $table->text('prd_describer');
            $table->string('prd_image','255');
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('cat_id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('products');
    }
}
