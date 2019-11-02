<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPropertiImgTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('properti_img', function(Blueprint $table)
		{
			$table->foreign('id_properti', 'FK_properti_img_properti')->references('id_properti')->on('properti')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('uploaded_by', 'FK_properti_img_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('properti_img', function(Blueprint $table)
		{
			$table->dropForeign('FK_properti_img_properti');
			$table->dropForeign('FK_properti_img_users');
		});
	}

}
