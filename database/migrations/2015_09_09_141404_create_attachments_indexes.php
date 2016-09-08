<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateAttachmentsIndexes extends BaseMigration
{

    protected $table = 'attachments';

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
