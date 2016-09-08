<?php

use ErpNET\App\Repositories\BaseMigration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends BaseMigration {

	protected $table = 'orders';

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
            $table->integer('partner_id')->unsigned()->index()->nullable();
            $table->integer('address_id')->unsigned()->index()->nullable();
            $table->integer('currency_id')->unsigned()->index()->nullable();
            $table->integer('type_id')->unsigned()->index()->nullable();
            $table->integer('payment_id')->unsigned()->index()->nullable();

            /**
             * Campos de data
             */
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('posted_at')->index();

            /**
             * Campos de dados
             */
            $table->string('mandante')->index();

            $table->float('valor_total')->nullable();
            $table->float('desconto_total')->nullable();
            $table->float('troco')->nullable();

            $table->text('descricao')->nullable();
            $table->string('referencia')->nullable();
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
