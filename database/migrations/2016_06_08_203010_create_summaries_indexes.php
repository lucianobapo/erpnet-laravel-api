<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateSummariesIndexes extends BaseMigration
{
    protected $table = 'summaries';

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
