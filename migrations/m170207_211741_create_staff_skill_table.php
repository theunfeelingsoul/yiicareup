<?php

use yii\db\Migration;

/**
 * Handles the creation of table `staff_skill`.
 */
class m170207_211741_create_staff_skill_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('staff_skill', [
            'id' => $this->primaryKey(),
            'skill' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('staff_skill');
    }
}
