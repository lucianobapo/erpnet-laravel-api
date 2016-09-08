<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateCostAllocateSharedStatRelations extends BaseMigration
{
    protected $table = 'cost_allocate_shared_stat';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upMigration()
    {
        $this->createForeign('cost_allocates','cost_allocate_id');
        $this->createForeign('shared_stats','shared_stat_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function downMigration()
    {
        $this->dropForeign('cost_allocates','cost_allocate_id');
        $this->dropForeign('shared_stats','shared_stat_id');
    }
}
