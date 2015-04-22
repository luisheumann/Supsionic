<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiasCategoriaInteres extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sias_categoria_interes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('empresa_id');
			$table->integer('categoria_id');
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
		Schema::drop('sias_categoria_interes');
	}

}
