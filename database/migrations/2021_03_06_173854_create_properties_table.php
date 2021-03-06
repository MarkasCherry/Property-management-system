<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('import_id')->nullable()->constrained('importers')->nullOnDelete();
            $table->string('code')->nullable();
            $table->string('name');
            $table->float('rating');
            $table->string('address');
            $table->text('short_description');
            $table->text('long_description')->nullable();
            $table->string('seo_h1_title')->nullable();
            $table->text('seo_meta_title')->nullable();
            $table->text('seo_meta_description')->nullable();
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('properties');
    }
}
