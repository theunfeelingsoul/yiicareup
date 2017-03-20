<?php

use yii\db\Migration;

/**
 * Handles the creation of table `skills_timetable`.
 */
class m161129_132703_create_skills_timetable_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('skills_timetable', [
            'id' => $this->primaryKey(),
            'days' => $this->string(),
            'skid' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('skills_timetable');
    }
}
