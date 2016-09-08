<?php

use ErpNET\App\Repositories\BaseMigration;
use Illuminate\Database\Schema\Blueprint;

class CreateSummaryProductContentsTable extends BaseMigration {

    protected $table = 'summary_product_contents';

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
            $table->integer('summary_id')->unsigned()->index()->nullable();
            $table->integer('product_id')->unsigned()->index()->nullable();

            /**
             * Campos de data
             */
            $table->timestamps();
            $table->softDeletes();

            /**
             * Mandante do Banco de dados
             */
            $table->string('mandante')->index();

            // Campos
            $table->float('stock_quantity');
//            $table->timestamp('stock_value_sum')->index();
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
