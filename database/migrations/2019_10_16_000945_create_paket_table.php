<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaketTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paket', function(Blueprint $table)
		{
			$table->string('id_paket', 50)->primary();
			$table->string('nama_paket', 50);
			$table->string('waktu', 50);
			$table->string('harga', 50);
			$table->enum('video', array('Y','N'));
			$table->enum('top_rekomen', array('Y','N'));
			$table->integer('max_gambar');
			$table->enum('free_ads', array('Y','N'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('paket');
	}

}
