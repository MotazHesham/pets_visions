<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStrayPetsTable extends Migration
{
    public function up()
    {
        Schema::table('stray_pets', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10452607')->references('id')->on('users');
            $table->unsignedBigInteger('pet_type_id')->nullable();
            $table->foreign('pet_type_id', 'pet_type_fk_10452608')->references('id')->on('pet_types');
        });
    }
}
