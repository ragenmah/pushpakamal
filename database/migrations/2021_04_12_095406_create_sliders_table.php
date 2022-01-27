<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('land_area');
            $table->integer('price');
            $table->string('address');
            $table->string('code');
            $table->string('property_type');
            $table->string('phone');
            $table->string('face_towards');
            $table->string('main_road_distance');
            $table->string('road_description');
            $table->integer('floors')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('kitchens')->nullable();
            $table->integer('living_rooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('property_status');
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
        Schema::dropIfExists('sliders');
    }
}
