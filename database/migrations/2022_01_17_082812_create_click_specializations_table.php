<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClickSpecializationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('click_specializations', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('specializationId');
            $table->foreignUuid('userId');
            $table->timestampTz('createdAt', $precision = 6);
            $table->timestampTz('updatedAt', $precision = 6);
            $table->softDeletesTz($column = 'deletedAt', $precision = 6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('click_specializations');
    }
}
