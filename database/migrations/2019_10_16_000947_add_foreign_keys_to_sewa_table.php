<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSewaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sewa', function(Blueprint $table)
		{
			$table->foreign('id_property', 'FK_sewa_properti')->references('id_properti')->on('properti')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sewa', function(Blueprint $table)
		{
			$table->dropForeign('FK_sewa_properti');
		});
	}

}
