<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStrayPetsTable extends Migration
{
    public function up()
    {
        Schema::create('stray_pets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('missing_place')->nullable();
            $table->string('receiving_place')->nullable();
            $table->date('date')->nullable();
            $table->longText('note')->nullable();
            $table->string('affiliation_link')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
