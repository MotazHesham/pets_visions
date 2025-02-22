<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAdoptionRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('adoption_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('adoption_pet_id')->nullable();
            $table->foreign('adoption_pet_id', 'adoption_pet_fk_10459773')->references('id')->on('adoption_pets');
        });
    }
}