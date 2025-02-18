<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNewsCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('news_comments', function (Blueprint $table) {
            $table->unsignedBigInteger('news_id')->nullable();
            $table->foreign('news_id', 'news_fk_10452722')->references('id')->on('newss');
        });
    }
}
