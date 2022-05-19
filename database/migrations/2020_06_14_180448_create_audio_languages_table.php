<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAudioLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( !Schema::hasTable('audio_languages') ) {
			Schema::create('audio_languages', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('language', 191);
				$table->timestamps();
			});
		}
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('audio_languages');
	}

}
