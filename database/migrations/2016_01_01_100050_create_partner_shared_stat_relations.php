<?php

use ErpNET\App\Repositories\BaseMigration;

class CreatePartnerSharedStatRelations extends BaseMigration
{
    protected $table = 'partner_shared_stat';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upMigration()
    {
        $this->createForeign('partners','partner_id');
        $this->createForeign('shared_stats','shared_stat_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function downMigration()
    {
        $this->dropForeign('partners','partner_id');
        $this->dropForeign('shared_stats','shared_stat_id');
    }
}
