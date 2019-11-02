<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePropertiFiturTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('properti_fitur', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('id_properti', 50);
			$table->integer('id_fitur')->index('FK_properti_fitur_fitur');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->unique(['id_properti','id_fitur'], 'Index4');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('properti_fitur');
	}

}
