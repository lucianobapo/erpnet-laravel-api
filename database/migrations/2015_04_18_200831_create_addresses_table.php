<?php

use ErpNET\App\Repositories\BaseMigration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressesTable extends BaseMigration {

    protected $table = 'addresses';

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

            /**
             * Campos de data
             */
			$table->timestamps();
            $table->softDeletes();

            /**
             * Campos de dados
             */
            $table->string('mandante')->index();

            $table->integer('cep')->unsigned();
            $table->string('logradouro');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('pais')->nullable();
            $table->string('obs')->nullable();
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
