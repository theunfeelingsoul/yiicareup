<?php

use yii\db\Migration;

/**
 * Handles adding user_id to table `skills_timetable`.
 */
class m161129_135251_add_user_id_column_to_skills_timetable_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('skills_timetable', 'user_id', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('skills_timetable', 'user_id');
    }
}
