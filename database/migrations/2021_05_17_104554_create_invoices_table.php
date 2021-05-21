<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('price', 255)->nullable(false);
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('productid');
            $table->timestamps();
            
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('productid')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('invoices');
    }
}
