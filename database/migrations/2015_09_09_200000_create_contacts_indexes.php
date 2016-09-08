<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateContactsIndexes extends BaseMigration
{
    protected $table = 'contacts';

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
