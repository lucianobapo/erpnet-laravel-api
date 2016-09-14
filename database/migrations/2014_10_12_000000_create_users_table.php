<?php

use Illuminate\Database\Schema\Blueprint;
use ErpNET\App\Repositories\BaseMigration;

class CreateUsersTable extends BaseMigration {

    protected $table = 'users';

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

            $table->integer('role_id')->unsigned()->index()->nullable();
//            $table->foreign('role_id')
//                ->references('id')
//                ->on('roles')
//                ->onDelete('restrict')
//                ->onUpdate('cascade');

            $table->string('mandante')->index();

			$table->string('name');
			$table->string('avatar')->nullable();
//			$table->string('email')->unique();
			$table->string('password')->nullable();

            $table->string('username')->nullable();
            $table->string('email')->unique()->default(time() . '-no-reply@ilhanet.com');
//            $table->string('email')->unique()->default(time() . '-no-reply@EasyAuthenticator.com')->change();
//            $table->string('avatar');
            $table->string('provider')->default('laravel');
            $table->string('provider_id')->unique()->nullable();
            $table->string('activation_code')->nullable();
            $table->integer('active')->nullable();

			$table->rememberToken();

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
