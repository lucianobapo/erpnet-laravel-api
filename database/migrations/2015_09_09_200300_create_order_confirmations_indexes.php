<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateOrderConfirmationsIndexes extends BaseMigration
{
    protected $table = 'order_confirmations';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upMigration()
    {
        $this->createIndex('deleted_at');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function downMigration()
    {
        $this->dropIndex('deleted_at');
    }
}
