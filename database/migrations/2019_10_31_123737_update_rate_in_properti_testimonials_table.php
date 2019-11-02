<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRateInPropertiTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('properti_testimonials', function (Blueprint $table) {
            $table->integer('rate')->nullable()->change();
        });
    }

    /** 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('properti_testimonials', function (Blueprint $table) {
            $table->integer('rate')->nullable(false)->change();
        });
    }
}
