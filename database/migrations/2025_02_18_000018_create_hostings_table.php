<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostingsTable extends Migration
{
    public function up()
    {
        Schema::create('hostings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hosting_name')->nullable();
            $table->string('hosting_phone');
            $table->string('hosting_type');
            $table->string('address')->nullable();
            $table->longText('about_us')->nullable();
            $table->longText('short_description')->nullable();
            $table->string('affiliation_link');
            $table->float('rating', 4, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
