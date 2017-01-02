<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VeicoliMigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('veicoli', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('colore');
                        $table->float('cilindrata');
                        $table->integer('potenza');
                        $table->float('peso');
                        $table->integer('fabricante_id')->unsigned();
                        $table->foreign('fabricante_id')->references('id')->on('fabricanti');
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
		Schema::drop('veicoli');
	}

}
