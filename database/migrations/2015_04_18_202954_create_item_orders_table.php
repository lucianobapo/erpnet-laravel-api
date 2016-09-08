<?php

use ErpNET\App\Repositories\BaseMigration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemOrdersTable extends BaseMigration {

	protected $table = 'item_orders';

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
            $table->integer('order_id')->unsigned()->index()->nullable();
            $table->integer('cost_id')->unsigned()->index()->nullable();
            $table->integer('product_id')->unsigned()->index()->nullable();
            $table->integer('currency_id')->unsigned()->index()->nullable();

			/**
			 * Campos de data
			 */
			$table->timestamps();
			$table->softDeletes();

			/**
			 * Campos de dados
			 */
			$table->string('mandante')->index();

            $table->float('quantidade');

            $table->float('valor_unitario');
            $table->float('desconto_unitario')->nullable();
            $table->text('descricao')->nullable();
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
