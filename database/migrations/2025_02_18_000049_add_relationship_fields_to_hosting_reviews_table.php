<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHostingReviewsTable extends Migration
{
    public function up()
    {
        Schema::table('hosting_reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('hosting_id')->nullable();
            $table->foreign('hosting_id', 'hosting_fk_10452527')->references('id')->on('hostings');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10452528')->references('id')->on('users');
        });
    }
}
