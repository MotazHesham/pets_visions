<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostingHostingServicePivotTable extends Migration
{
    public function up()
    {
        Schema::create('hosting_hosting_service', function (Blueprint $table) {
            $table->unsignedBigInteger('hosting_id');
            $table->foreign('hosting_id', 'hosting_id_fk_10452525')->references('id')->on('hostings')->onDelete('cascade');
            $table->unsignedBigInteger('hosting_service_id');
            $table->foreign('hosting_service_id', 'hosting_service_id_fk_10452525')->references('id')->on('hosting_services')->onDelete('cascade');
        });
    }
}
