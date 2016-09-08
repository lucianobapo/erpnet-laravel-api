<?php

use ErpNET\App\Repositories\BaseMigration;
use Illuminate\Database\Schema\Blueprint;

class CreateSharedCurrenciesTable extends BaseMigration {

	protected $table = 'shared_currencies';

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

			$table->string('nome_universal', 3);
			$table->string('descricao')->nullable();
		});


//        Schema::create('orders_has_shared_currencies',function(Blueprint $table){
//            $table->timestamps();
//
//            $table->integer('order_id')->unsigned()->index();
//            $table->foreign('order_id')->references('id')
//                ->on('orders')
//                ->onDelete('restrict')
//                ->onUpdate('cascade');
//
//            $table->integer('currency_id')->unsigned()->index();
//            $table->foreign('currency_id')->references('id')
//                ->on('shared_currencies')
//                ->onDelete('restrict')
//                ->onUpdate('cascade');
//        });

//        Schema::create('item_orders_has_shared_currencies',function(Blueprint $table){
//            $table->timestamps();
//
//            $table->integer('item_id')->unsigned()->index();
//            $table->foreign('item_id')->references('id')
//                ->on('item_orders')
//                ->onDelete('restrict')
//                ->onUpdate('cascade');
//
//            $table->integer('currency_id')->unsigned()->index();
//            $table->foreign('currency_id')->references('id')
//                ->on('shared_currencies')
//                ->onDelete('restrict')
//                ->onUpdate('cascade');
//        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function downMigration()
	{
//        Schema::drop('orders_has_shared_currencies');
//        Schema::drop('item_orders_has_shared_currencies');
		$this->dropTable();
	}

}
