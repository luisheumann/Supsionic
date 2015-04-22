<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiasPaisesOperacion extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sias_paises_operacion', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('empresa_id');
			$table->integer('pais_id');
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
		Schema::drop('sias_paises_operacion');
	}

}
