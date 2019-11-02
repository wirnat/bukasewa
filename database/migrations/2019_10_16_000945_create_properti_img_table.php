<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePropertiImgTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('properti_img', function(Blueprint $table)
		{
			$table->integer('id_img', true);
			$table->string('id_properti', 50)->index('FK_properti_img_properti');
			$table->text('link', 65535);
			$table->string('tag', 50);
			$table->enum('tipe', array('img','video'));
			$table->integer('uploaded_by')->unsigned()->index('FK_properti_img_users');
			$table->timestamp('uploaded_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('properti_img');
	}

}
