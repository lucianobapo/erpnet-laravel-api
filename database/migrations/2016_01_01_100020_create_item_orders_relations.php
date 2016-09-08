<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateItemOrdersRelations extends BaseMigration
{
    protected $table = 'item_orders';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upMigration()
    {
        $this->createForeign('orders','order_id');
        $this->createForeign('cost_allocates','cost_id');
        $this->createForeign('products','product_id');
        $this->createForeign('shared_currencies','currency_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function downMigration()
    {
        $this->dropForeign('orders','order_id');
        $this->dropForeign('cost_allocates','cost_id');
        $this->dropForeign('products','product_id');
        $this->dropForeign('shared_currencies','currency_id');
    }
}
