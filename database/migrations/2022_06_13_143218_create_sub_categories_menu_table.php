<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories_menu', function (Blueprint $table) {
            $table->id();
            $table->string('subcategories_name');
            $table->integer('categories_id');
            $table->string('subcategories_image')->nullable();
            $table->string('short_description')->nullable();
            $table->enum('is_sub_parent',['active', ['inactive']])->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categories_menu');
    }
};
