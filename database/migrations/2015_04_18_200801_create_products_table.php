<?php

use ErpNET\App\Repositories\BaseMigration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends BaseMigration {

	protected $table = 'products';

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
			$table->integer('uom_id')->unsigned()->index()->nullable();
			$table->integer('cost_id')->unsigned()->index()->nullable();

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
            $table->string('imagem')->nullable();
            $table->string('icone')->nullable();
            $table->string('cod_fiscal')->nullable();
            $table->string('cod_barra')->nullable();
            $table->boolean('promocao')->default(0);
            $table->boolean('estoque')->default(0);
			$table->integer('estoque_minimo')->unsigned()->nullable();
            $table->float('valorUnitVenda')->nullable();
            $table->float('valorUnitVendaPromocao')->nullable();
            $table->float('valorUnitCompra')->nullable();
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
