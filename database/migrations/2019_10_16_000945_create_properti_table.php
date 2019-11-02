<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePropertiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('properti', function(Blueprint $table)
		{
			$table->string('id_properti', 50)->primary();
			$table->enum('status', array('sewa','jual'));
			$table->string('paket', 50)->default('A0')->index('FK_properti_paket');
			$table->string('properti');
			$table->integer('id_user')->unsigned()->nullable()->index('FK_properti_users');
			$table->string('lat', 50);
			$table->string('lng', 50);
			$table->text('alamat', 65535);
			$table->integer('kategori')->index('FK_properti_kategori');
			$table->integer('kamar');
			$table->integer('toilet')->default(0);
			$table->integer('garasi')->default(0);
			$table->integer('balkon')->default(0);
			$table->integer('tv')->default(0);
			$table->timestamp('diupdate_pada')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->text('deskripsi', 65535)->nullable();
			$table->enum('aktif', array('aktif','nonaktif'))->default('aktif');
			$table->string('harga', 250)->nullable();
			$table->string('luasruangan', 50)->nullable();
			$table->string('whatsapp', 15);
			$table->integer('region')->index('FK_properti_region');
			$table->timestamp('dibuat_pada')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('properti');
	}

}
