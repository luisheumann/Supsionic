<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateImgProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('img_productos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('producto_id');
			$table->string('imagen');
			$table->string('deleteUrl');
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
		Schema::drop('img_productos');
	}

}
