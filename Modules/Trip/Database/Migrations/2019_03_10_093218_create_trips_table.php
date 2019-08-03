<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('trips', function (Blueprint $table) {
			$table->increments('id');
			$table->string('der_license_image');
			$table->string('boat_license_image');
			$table->string('right_side_boat_image');
			$table->string('left_side_boat_image');
			$table->string('price');
			$table->string('passenger_price');
			$table->longText('desc');
			$table->string('day');
			$table->string('hour');
			$table->date('date');
			$table->date('started_at');
			$table->date('ended_at');
			$table->string('trip_hour');
			$table->integer('passengers')->nullable();
			$table->string('boat_number')->nullable();
			$table->string('boat_title')->nullable();
			$table->string('berth')->nullable();
			$table->integer('user_id')->unsigned();
			//$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->enum('status', ['active', 'pending'])->default('active');
			$table->timestamps();
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('trips');
	}
}
