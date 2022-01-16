<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string("user_id"); 
            $table->string("product_id")->nullable(); 
            $table->string("product_qty")->nullable(); 
            $table->string("product_total")->nullable(); 
            $table->string("trans_total")->nullable(); 
            $table->string("trans_ref")->nullable(); 
            $table->string("trans_status")->nullable(); 
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
        Schema::dropIfExists('payments');
    }
}
