<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateAttachmentsRelations extends BaseMigration
{
    protected $table = 'attachments';

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
