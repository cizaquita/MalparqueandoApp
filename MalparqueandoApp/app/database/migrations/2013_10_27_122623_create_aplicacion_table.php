<?php

use Illuminate\Database\Migrations\Migration;

class CreateAplicacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('aplicacion',function($table)
		{
			$table->increments('id');
			$table->string('placa');
			$table->string('imagen');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('aplicacion');
	}

}