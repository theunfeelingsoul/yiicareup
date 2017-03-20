<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tagsdisplay`.
 */
class m161125_145301_create_tagsdisplay_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tags_display', [
            'id' => $this->primaryKey(),
            'tag_name' => $this->string(),
            'user_id' => $this->string(),
            'office_id' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tagsdisplay');
    }
}
