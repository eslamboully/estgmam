<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('posts', function (Blueprint $table) {
			$table->increments('id');
			$table->string('image')->default('default.png');
			$table->longText('desc');
			$table->string('status')->default('pending');
			$table->string('photo1')->nullable();
			$table->string('photo2')->nullable();
			$table->string('photo3')->nullable();
			$table->string('photo4')->nullable();
			$table->string('photo5')->nullable();
			$table->string('photo6')->nullable();
            $table->date('started_at');
            $table->date('ended_at');
			$table->integer('plan_id')->unsigned();
			$table->integer('user_id')->unsigned()->nullable();
			//$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			//$table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
			$table->timestamps();
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('posts');
	}
}
