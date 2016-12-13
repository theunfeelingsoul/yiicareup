<?php

use yii\db\Migration;

/**
 * Handles adding office_id to table `skills_timetable`.
 */
class m161205_132111_add_office_id_column_to_skills_timetable_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('skills_timetable', 'office_id', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('skills_timetable', 'office_id');
    }
}
