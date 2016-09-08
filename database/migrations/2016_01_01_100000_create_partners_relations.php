<?php

use ErpNET\App\Repositories\BaseMigration;

class CreatePartnersRelations extends BaseMigration
{
    protected $table = 'partners';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upMigration()
    {
        $this->createForeign('users','user_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function downMigration()
    {
        $this->dropForeign('users','user_id');
    }
}
