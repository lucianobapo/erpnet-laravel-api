<?php

use ErpNET\App\Repositories\BaseMigration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentsTable extends BaseMigration {

	protected $table = 'documents';

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

			$table->integer('partner_id')->unsigned()->index()->nullable();

			$table->timestamps();
            $table->softDeletes();

            $table->string('mandante')->index();

            $table->string('document_type');
            $table->string('document_data');
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
