<?php

use ErpNET\App\Repositories\BaseMigration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnerPartnerGroupTable extends BaseMigration {

	protected $table = 'partner_partner_group';

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

			$table->integer('partner_id')->unsigned()->index();
			$table->integer('partner_group_id')->unsigned()->index();
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
