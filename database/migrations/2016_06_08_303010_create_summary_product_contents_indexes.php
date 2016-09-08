<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateSummaryProductContentsIndexes extends BaseMigration
{
    protected $table = 'summary_product_contents';

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
