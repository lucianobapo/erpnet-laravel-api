<?php

use ErpNET\App\Repositories\BaseMigration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnersTable extends BaseMigration {

	protected $table = 'partners';

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

			/**
			 * Relacionamentos entre as tabelas
			 */
            $table->integer('user_id')->unsigned()->index()->nullable();

			/**
			 * Campos de data
			 */
			$table->timestamps();
			$table->softDeletes();

			/**
			 * Campos de dados
			 */
			$table->string('mandante')->index();
            $table->string('nome');
            $table->timestamp('data_nascimento')->nullable();
            $table->string('observacao')->nullable();

            //temporario
            $table->integer('old_id')->index()->nullable();
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
