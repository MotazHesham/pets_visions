<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParamedicsTable extends Migration
{
    public function up()
    {
        Schema::create('paramedics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('active')->default(0);
            $table->time('from_time');
            $table->time('to_time');
            $table->string('affiliation_link');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
