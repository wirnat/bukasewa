<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBeliTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('beli', function(Blueprint $table)
		{
			$table->foreign('id_properti', 'FK_beli_properti')->references('id_properti')->on('properti')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('beli', function(Blueprint $table)
		{
			$table->dropForeign('FK_beli_properti');
		});
	}

}
