<?php

use ErpNET\App\Repositories\BaseMigration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttachmentsTable extends BaseMigration {

    protected $table = 'attachments';

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

            /**
             * Mandante do Banco de dados
             */
            $table->string('mandante')->index();

            // Campos
            $table->string('file')->nullable();
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
