<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsParsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cms_parsers', function($table)
		{
		    $table->increments('id');
		    $table->string('table');
		    $table->string('column');
		    $table->string('column_name');
		    $table->string('column_group');
		    $table->string('parser');
		    $table->string('parser_conf');
		    $table->integer('pos');
		    $table->enum('show', array('-1', '1'));
		    $table->enum('multi_lang', array('-1', '1'));
		    $table->string('descr');
		    $table->enum('filter', array('-1', '1'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cms_parsers');
	}

}
