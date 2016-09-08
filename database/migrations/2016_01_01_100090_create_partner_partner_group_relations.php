<?php

use ErpNET\App\Repositories\BaseMigration;

class CreatePartnerPartnerGroupRelations extends BaseMigration
{
    protected $table = 'partner_partner_group';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upMigration()
    {
        $this->createForeign('partners','partner_id');
        $this->createForeign('partner_groups','partner_group_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function downMigration()
    {
        $this->dropForeign('partners','partner_id');
        $this->dropForeign('partner_groups','partner_group_id');
    }
}
