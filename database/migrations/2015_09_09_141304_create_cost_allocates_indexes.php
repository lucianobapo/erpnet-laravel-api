<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateCostAllocatesIndexes extends BaseMigration
{
    protected $table = 'cost_allocates';

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
