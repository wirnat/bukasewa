<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLokasiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lokasi', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nama_lokasi', 250);
			$table->string('tag', 50);
			$table->string('lat', 50);
			$table->string('lng', 50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lokasi');
	}

}
