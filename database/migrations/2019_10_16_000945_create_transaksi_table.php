<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransaksiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transaksi', function(Blueprint $table)
		{
			$table->string('id_transaksi', 50)->nullable();
			$table->string('jumlah_transaksi', 50)->nullable();
			$table->string('id_user', 50)->nullable();
			$table->string('tanggal_transaksi', 50)->nullable();
			$table->string('subjek', 50)->nullable();
			$table->string('status', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transaksi');
	}

}
