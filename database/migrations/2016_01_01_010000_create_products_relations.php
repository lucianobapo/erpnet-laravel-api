<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateProductsRelations extends BaseMigration
{
    protected $table = 'products';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upMigration()
    {
        $this->createForeign('shared_unit_of_measures','uom_id');
        $this->createForeign('cost_allocates','cost_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function downMigration()
    {
        $this->dropForeign('shared_unit_of_measures','uom_id');
        $this->dropForeign('cost_allocates','cost_id');
    }
}
