<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateItemOrdersIndexes extends BaseMigration
{
    protected $table = 'item_orders';

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
