<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdoptionPetsTable extends Migration
{
    public function up()
    {
        Schema::create('adoption_pets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('fasila');
            $table->string('age');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
