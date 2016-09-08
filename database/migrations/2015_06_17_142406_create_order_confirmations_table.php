<?php

use ErpNET\App\Repositories\BaseMigration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderConfirmationsTable extends BaseMigration {

    protected $table = 'order_confirmations';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upMigration()
    {
        $this->createTable(function (Blueprint $table) {
            $table->increments('id');

            /**
             * Relacionamentos entre as tabelas
             */
            $table->integer('order_id')->unsigned()->index()->nullable();

            /**
             * Campos de data
             */
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('posted_at')->nullable();

            /**
             * Mandante do Banco de dados
             */
            $table->string('mandante')->index();

            $table->enum('type', array_keys(config('delivery.order_confirmation_types')));
            $table->string('message')->nullable();
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
