<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutaTrasnporteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ruta_transporte', function(Blueprint $table)
		{
			$table->increments('id');
		    $table->integer('intereses_transporte_id');
			$table->integer('pais_destino');
			$table->integer('pais_origen');
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
		Schema::drop('ruta_transporte');
	}

}
