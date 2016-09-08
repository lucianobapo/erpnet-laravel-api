<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateOrderSharedStatRelations extends BaseMigration
{
    protected $table = 'order_shared_stat';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upMigration()
    {
        $this->createForeign('orders','order_id');
        $this->createForeign('shared_stats','shared_stat_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function downMigration()
    {
        $this->dropForeign('orders','order_id');
        $this->dropForeign('shared_stats','shared_stat_id');
    }
}
