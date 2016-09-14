<?php

use ErpNET\App\Repositories\BaseMigration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends BaseMigration {

	protected $table = 'contacts';

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

            $table->string('contact_type');
            $table->string('contact_data');
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
