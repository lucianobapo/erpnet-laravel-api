<?php

use ErpNET\App\Repositories\BaseMigration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductGroupsTable extends BaseMigration {

	protected $table = 'product_groups';

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
			$table->timestamps();
            $table->softDeletes();

            $table->string('mandante')->index();

            $table->string('grupo');
            $table->string('icone')->nullable();
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
