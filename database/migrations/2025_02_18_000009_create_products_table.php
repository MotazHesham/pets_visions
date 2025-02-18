<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('current_stock')->nullable();
            $table->decimal('price', 15, 2);
            $table->longText('description')->nullable();
            $table->longText('details')->nullable();
            $table->string('video_provider')->nullable();
            $table->string('video_link')->nullable();
            $table->string('added_by')->nullable();
            $table->string('tags')->nullable();
            $table->boolean('published')->default(0)->nullable();
            $table->boolean('featured')->default(0)->nullable();
            $table->string('affiliation_link')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('slug');
            $table->float('rating', 4, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
