<?php

use ErpNET\App\Repositories\BaseMigration;
use Illuminate\Database\Schema\Blueprint;

class CreateSharedOrderPaymentsTable extends BaseMigration {

	protected $table = 'shared_order_payments';

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

            $table->string('pagamento')->index();
            $table->string('descricao')->nullable();
		});

//        Schema::create('orders_has_shared_order_payments',function(Blueprint $table){
//            $table->timestamps();
//
//            $table->integer('order_id')->unsigned()->index();
//            $table->foreign('order_id')->references('id')
//                ->on('orders')
//                ->onDelete('restrict')
//                ->onUpdate('cascade');
//
//            $table->integer('order_payment_id')->unsigned()->index();
//            $table->foreign('order_payment_id')->references('id')
//                ->on('shared_order_payments')
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
//		Schema::drop('orders_has_shared_order_payments');
		$this->dropTable();
	}

}
