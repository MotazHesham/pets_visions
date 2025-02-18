<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clinic_name');
            $table->string('clinic_phone')->nullable();
            $table->string('unified_phone')->nullable();
            $table->string('short_description')->nullable();
            $table->string('address')->nullable();
            $table->longText('about_us')->nullable();
            $table->float('rating', 4, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
