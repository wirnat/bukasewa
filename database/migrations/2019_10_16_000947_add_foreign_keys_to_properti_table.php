<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPropertiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('properti', function(Blueprint $table)
		{
			$table->foreign('kategori', 'FK_properti_kategori')->references('id')->on('kategori')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('paket', 'FK_properti_paket')->references('id_paket')->on('paket')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('region', 'FK_properti_region')->references('id')->on('region')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('id_user', 'FK_properti_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('properti', function(Blueprint $table)
		{
			$table->dropForeign('FK_properti_kategori');
			$table->dropForeign('FK_properti_paket');
			$table->dropForeign('FK_properti_region');
			$table->dropForeign('FK_properti_users');
		});
	}

}
