<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateOrderConfirmationsRelations extends BaseMigration
{
    protected $table = 'order_confirmations';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upMigration()
    {
        $this->createForeign('orders','order_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function downMigration()
    {
        $this->dropForeign('orders','order_id');
    }
}
