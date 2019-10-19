<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPropertiFiturTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('properti_fitur', function(Blueprint $table)
		{
			$table->foreign('id_fitur', 'FK_properti_fitur_fitur')->references('id_fitur')->on('fitur')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('id_properti', 'FK_properti_fitur_properti')->references('id_properti')->on('properti')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('properti_fitur', function(Blueprint $table)
		{
			$table->dropForeign('FK_properti_fitur_fitur');
			$table->dropForeign('FK_properti_fitur_properti');
		});
	}

}
