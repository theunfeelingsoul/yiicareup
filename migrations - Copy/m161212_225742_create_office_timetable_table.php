<?php

use yii\db\Migration;

/**
 * Handles the creation of table `office_timetable`.
 */
class m161212_225742_create_office_timetable_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('office_timetable', [
            'id' => $this->primaryKey(),
            'day_and_time' => $this->string(255),
            'skid' => $this->integer(),
            'usre_id' => $this->integer(),
            'status' => $this->string(255),
            'office_id' => $this->string(255),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('office_timetable');
    }
}
