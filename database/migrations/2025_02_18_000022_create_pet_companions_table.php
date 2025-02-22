<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetCompanionsTable extends Migration
{
    public function up()
    {
        Schema::create('pet_companions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nationality')->nullable();
            $table->longText('experience')->nullable();
            $table->string('affiliation_link');
            $table->float('rating', 4, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
