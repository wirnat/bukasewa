<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSewaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sewa', function(Blueprint $table)
		{
			$table->string('id_sewa', 50)->primary();
			$table->string('id_property', 50)->index('FK_sewa_properti');
			$table->enum('durasi', array('hari','bulan','tahun','minggu'));
			$table->string('harga', 50);
			$table->timestamp('diupdate_pada')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sewa');
	}

}
