<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateOrdersRelations extends BaseMigration
{
    protected $table = 'orders';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upMigration()
    {
        $this->createForeign('partners','partner_id');
        $this->createForeign('addresses','address_id');
        $this->createForeign('shared_currencies','currency_id');
        $this->createForeign('shared_order_types','type_id');
        $this->createForeign('shared_order_payments','payment_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function downMigration()
    {
        $this->dropForeign('partners','partner_id');
        $this->dropForeign('addresses','address_id');
        $this->dropForeign('shared_currencies','currency_id');
        $this->dropForeign('shared_order_types','type_id');
        $this->dropForeign('shared_order_payments','payment_id');
    }
}
