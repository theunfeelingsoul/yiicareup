<?php

use yii\db\Migration;

/**
 * Handles adding status to table `skills_timetable`.
 */
class m161203_060324_add_status_column_to_skills_timetable_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('skills_timetable', 'status', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('skills_timetable', 'status');
    }
}
