<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBeliTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('beli', function(Blueprint $table)
		{
			$table->integer('id_beli', true);
			$table->string('harga_jual')->default('0');
			$table->string('id_properti')->default('0')->index('FK_beli_properti');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('beli');
	}

}
