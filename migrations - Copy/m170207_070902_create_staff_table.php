<?php

use yii\db\Migration;

/**
 * Handles the creation of table `staff`.
 */
class m170207_070902_create_staff_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('staff', [
            'id' => $this->primaryKey(),
            'staff_name' => $this->string(),
            'staff_skill' => $this->string(),
            'staff_years_of_exp'=> $this->string(),
            'user_id'=> $this->integer(),
            'office_id'=> $this->integer(),
            'image_path'=> $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('staff');
    }
}
