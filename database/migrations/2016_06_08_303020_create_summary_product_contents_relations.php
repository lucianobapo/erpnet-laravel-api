<?php

use ErpNET\App\Repositories\BaseMigration;

class CreateSummaryProductContentsRelations extends BaseMigration
{
    protected $table = 'summary_product_contents';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upMigration()
    {
        $this->createForeign('summaries','summary_id');
        $this->createForeign('products','product_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function downMigration()
    {
        $this->dropForeign('summaries','summary_id');
        $this->dropForeign('products','product_id');
    }
}
