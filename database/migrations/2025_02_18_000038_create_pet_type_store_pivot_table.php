<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetTypeStorePivotTable extends Migration
{
    public function up()
    {
        Schema::create('pet_type_store', function (Blueprint $table) {
            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id', 'store_id_fk_10452453')->references('id')->on('stores')->onDelete('cascade');
            $table->unsignedBigInteger('pet_type_id');
            $table->foreign('pet_type_id', 'pet_type_id_fk_10452453')->references('id')->on('pet_types')->onDelete('cascade');
        });
    }
}
