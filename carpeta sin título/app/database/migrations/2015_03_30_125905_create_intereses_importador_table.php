<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteresesImportadorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('intereses_importador', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('empresa_id');
			$table->integer('categoria_id');
			$table->string('productos');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('intereses_importador');
	}

}
