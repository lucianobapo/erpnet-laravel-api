<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateAddressesRelations extends BaseMigration
{
    protected $table = 'addresses';

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
