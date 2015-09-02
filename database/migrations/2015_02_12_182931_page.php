<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Page extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('page', function($table)
		{
		    // первичный ключ с автоинкрементом
		    $table->increments('id');
		    $table->integer('tree_id');
		    $table->integer('tree_patch');
		    $table->string('name');
		    $table->longText('body');
		    $table->string('href');
		    $table->string('template');
		    $table->enum('in_menu', array('-1', '1'));
		    // мак-адрес клиента, содержит ровно 12 символов.
		    // поэтому добавим в таблицу поле “mac” формата  varchar(12)
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('page');
	}

}
