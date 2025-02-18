<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewssTable extends Migration
{
    public function up()
    {
        Schema::create('newss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('added_by')->nullable();
            $table->string('title')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('published')->default(0)->nullable();
            $table->boolean('featured')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
