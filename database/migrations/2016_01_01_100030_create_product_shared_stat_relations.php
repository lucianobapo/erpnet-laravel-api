<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateProductSharedStatRelations extends BaseMigration
{
    protected $table = 'product_shared_stat';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upMigration()
    {
        $this->createForeign('products','product_id');
        $this->createForeign('shared_stats','shared_stat_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function downMigration()
    {
        $this->dropForeign('products','product_id');
        $this->dropForeign('shared_stats','shared_stat_id');
    }
}
