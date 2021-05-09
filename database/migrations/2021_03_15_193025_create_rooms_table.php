<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties')->cascadeOnDelete();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('room_number');
            $table->integer('capacity');
            $table->integer('bed_count');
            $table->integer('bathroom_count');
            $table->string('short_description');
            $table->text('long_description');
            $table->string('seo_h1_title')->nullable();
            $table->text('seo_meta_title')->nullable();
            $table->text('seo_meta_description')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
