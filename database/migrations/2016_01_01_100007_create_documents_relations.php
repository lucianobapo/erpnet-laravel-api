<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateDocumentsRelations extends BaseMigration
{
    protected $table = 'documents';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upMigration()
    {
        $this->createForeign('partners','partner_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function downMigration()
    {
        $this->dropForeign('partners','partner_id');
    }
}
