<?php

use ErpNET\App\Repositories\BaseMigration;
use Illuminate\Database\Schema\Blueprint;

class CreateCostAllocatesTable extends BaseMigration {

	protected $table = 'cost_allocates';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function upMigration()
	{
		$this->createTable(function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('id_superior')->unsigned()->nullable();

			/**
			 * Campos de data
			 */
			$table->timestamps();
			$table->softDeletes();

			/**
			 * Campos de dados
			 */
			$table->string('mandante')->index();

            $table->string('numero');
            $table->string('nome');
            $table->string('descricao');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function downMigration()
	{
		$this->dropTable();
	}

}
