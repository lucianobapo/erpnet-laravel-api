<?php

use ErpNET\App\Repositories\BaseMigration;
use Illuminate\Database\Schema\Blueprint;

class CreateSharedStatsTable extends BaseMigration {

    protected $table = 'shared_stats';

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

            $table->string('status')->index();
            $table->string('descricao')->nullable();
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
