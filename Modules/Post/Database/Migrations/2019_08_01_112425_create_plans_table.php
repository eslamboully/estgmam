<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('money')->default(0);
            $table->timestamps();
        });

        Schema::create('plan_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('plan_id')->unsigned();
            $table->string('date');
            $table->string('currency');
            $table->string('locale')->index();

            $table->unique(['plan_id','locale']);
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
