<?php

use yii\db\Migration;

class m161212_230000_rename_column_usre_id_to_user_id extends Migration
{
    public function up()
    {
        $this->renameColumn ( 'office_timetable', 'usre_id', 'user_id');
    }

    public function down()
    {
        $this->renameColumn ( 'office_timetable', 'user_id','usre_id');
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
