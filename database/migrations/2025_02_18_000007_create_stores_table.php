<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('store_name');
            $table->string('store_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('domain')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
