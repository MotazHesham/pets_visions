<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToClinicReviewsTable extends Migration
{
    public function up()
    {
        Schema::table('clinic_reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('clinic_id')->nullable();
            $table->foreign('clinic_id', 'clinic_fk_10452414')->references('id')->on('clinics');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10452415')->references('id')->on('users');
        });
    }
}
