<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserPetsTable extends Migration
{
    public function up()
    {
        Schema::table('user_pets', function (Blueprint $table) {
            $table->unsignedBigInteger('pet_type_id')->nullable();
            $table->foreign('pet_type_id', 'pet_type_fk_10452742')->references('id')->on('pet_types');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10452744')->references('id')->on('users');
        });
    }
}
