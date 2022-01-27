<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNegotiableStatusToSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Sliders', function (Blueprint $table) {
            $table->string('negotiable_status')->after('property_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Sliders', function (Blueprint $table) {
            $table->dropColumn('negotiable_status');
        });
    }
}
