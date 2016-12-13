<?php

use yii\db\Migration;

class m161203_060900_rename_days_column_to_day_and_time_column extends Migration
{
    public function up()
    {
        $this->renameColumn ( 'skills_timetable', 'days', 'day_and_time');
    }

    public function down()
    {
         $this->renameColumn ( 'skills_timetable', 'day_and_time','days');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
