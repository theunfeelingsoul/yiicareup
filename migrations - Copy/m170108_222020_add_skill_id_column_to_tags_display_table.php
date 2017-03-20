<?php

use yii\db\Migration;

/**
 * Handles adding skill_id to table `tags_display`.
 */
class m170108_222020_add_skill_id_column_to_tags_display_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('tags_display', 'skill_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('tags_display', 'skill_id');
    }
}
