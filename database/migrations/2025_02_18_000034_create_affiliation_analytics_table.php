<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliationAnalyticsTable extends Migration
{
    public function up()
    {
        Schema::create('affiliation_analytics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model_type')->nullable();
            $table->integer('model')->nullable();
            $table->string('ip')->nullable();
            $table->integer('num_of_clicks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
