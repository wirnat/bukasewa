<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('properti_testimonials', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('id_properti', 50)->index('FK_properti_testimonials_properti');
			$table->text('comment', 65535);
			$table->integer('rate')->default(0);
			$table->integer('id_user')->unsigned()->nullable()->index('FK_properti_testimonials_users');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
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
		Schema::drop('properti_testimonials');
    }
}
