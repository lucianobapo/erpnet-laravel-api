<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateItemOrderSharedStatRelations extends BaseMigration
{
    protected $table = 'item_order_shared_stat';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upMigration()
    {
        $this->createForeign('item_orders','item_id');
        $this->createForeign('shared_stats','shared_stat_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function downMigration()
    {
        $this->dropForeign('item_orders','item_id');
        $this->dropForeign('shared_stats','shared_stat_id');
    }
}
