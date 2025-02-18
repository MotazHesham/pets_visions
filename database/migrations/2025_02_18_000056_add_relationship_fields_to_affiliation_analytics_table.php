<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAffiliationAnalyticsTable extends Migration
{
    public function up()
    {
        Schema::table('affiliation_analytics', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10452818')->references('id')->on('users');
        });
    }
}
