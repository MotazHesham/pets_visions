<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPetCompanionReviewsTable extends Migration
{
    public function up()
    {
        Schema::table('pet_companion_reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('pet_companion_id')->nullable();
            $table->foreign('pet_companion_id', 'pet_companion_fk_10452763')->references('id')->on('pet_companions');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10452764')->references('id')->on('users');
        });
    }
}
