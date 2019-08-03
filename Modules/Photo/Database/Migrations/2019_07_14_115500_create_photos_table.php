<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('photos', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('user_id')->nullable();
			$table->string('image');
			$table->timestamps();
		});

		Schema::create('photo_translations', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('photo_id')->unsigned()->nullable();
			$table->string('title');
			$table->string('locale')->index();
			$table->unique(['photo_id', 'locale']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('photo_translations');
		Schema::dropIfExists('photos');
	}
}
