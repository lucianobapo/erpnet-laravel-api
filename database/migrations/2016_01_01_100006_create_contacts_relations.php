<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateContactsRelations extends BaseMigration
{
    protected $table = 'contacts';

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
