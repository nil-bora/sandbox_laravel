<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cms_tables', function($table)
		{
		    // первичный ключ с автоинкрементом
		    $table->increments('id');
		    $table->string('name');
		    $table->string('system_name');
		    $table->enum('active', array('-1', '1'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cms_tables');
	}

}
