<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Parsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parsers', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
		    $table->string('descr');
		    $table->string('conf');
		    $table->integer('pos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('parsers');
	}

}
