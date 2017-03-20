<?php

use yii\db\Migration;

/**
 * Handles dropping skid from table `office_timetable`.
 */
class m161212_234025_drop_skid_column_from_office_timetable_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('office_timetable', 'skid');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('office_timetable', 'skid', $this->integer());
    }
}
