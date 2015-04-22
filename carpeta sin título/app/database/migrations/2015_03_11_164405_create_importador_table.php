<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportadorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('importador', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('perfil_empresa_id');
			$table->integer('producto_id');
			$table->integer('pais_origen');
			$table->integer('pais_destino');
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
		Schema::drop('importador');
	}

}
