<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToPropertiTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
            Schema::table('properti_testimonials', function(Blueprint $table){
                DB::statement("ALTER TABLE `properti_testimonials` ADD CONSTRAINT `FK_properti_testimonials_users` FOREIGN KEY (`id_user`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
                DB::statement("ALTER TABLE `properti_testimonials` ADD CONSTRAINT `FK_properti_testimonials_properti` FOREIGN KEY (`id_properti`) REFERENCES `properti`(`id_properti`) ON DELETE CASCADE ON UPDATE CASCADE;");
        
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('properti_testimonials', function(Blueprint $table)
		{
            
		});
    }
}
