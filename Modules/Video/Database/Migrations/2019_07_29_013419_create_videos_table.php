<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {

		Schema::create('videos', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('link');
			$table->bigInteger('user_id')->nullable();
			$table->timestamps();
		});

		Schema::create('video_translations', function (Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('video_id')->unsigned();
			$table->string('title');
			$table->longText('desc');
			$table->string('locale')->index();
			$table->unique(['video_id', 'locale']);
			$table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('videos');
	}
}
