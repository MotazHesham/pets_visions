<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryPetsTable extends Migration
{
    public function up()
    {
        Schema::create('delivery_pets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('from_city')->nullable();
            $table->string('to_city')->nullable();
            $table->date('date')->nullable();
            $table->longText('note')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->longText('pets_details')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
