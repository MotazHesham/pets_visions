<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetCompanionPetTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('pet_companion_pet_type', function (Blueprint $table) {
            $table->unsignedBigInteger('pet_companion_id');
            $table->foreign('pet_companion_id', 'pet_companion_id_fk_10452590')->references('id')->on('pet_companions')->onDelete('cascade');
            $table->unsignedBigInteger('pet_type_id');
            $table->foreign('pet_type_id', 'pet_type_id_fk_10452590')->references('id')->on('pet_types')->onDelete('cascade');
        });
    }
}
