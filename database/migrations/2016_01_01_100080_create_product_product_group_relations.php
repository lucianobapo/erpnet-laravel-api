<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateProductProductGroupRelations extends BaseMigration
{
    protected $table = 'product_product_group';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upMigration()
    {
        $this->createForeign('products','product_id');
        $this->createForeign('product_groups','product_group_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function downMigration()
    {
        $this->dropForeign('products','product_id');
        $this->dropForeign('product_groups','product_group_id');
    }
}
