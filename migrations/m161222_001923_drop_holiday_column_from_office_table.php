<?php

use yii\db\Migration;

/**
 * Handles dropping holiday from table `office`.
 */
class m161222_001923_drop_holiday_column_from_office_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('office', 'holiday');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('office', 'holiday', $this->text);
    }
}
