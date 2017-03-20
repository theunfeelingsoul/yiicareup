<?php

use yii\db\Migration;

/**
 * Handles adding appeal to table `staff`.
 */
class m170208_134752_add_appeal_column_to_staff_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('staff', 'appeal', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('staff', 'appeal');
    }
}
