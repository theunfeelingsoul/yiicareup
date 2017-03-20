<?php

use yii\db\Migration;

/**
 * Handles dropping tag_name from table `tags_display`.
 */
class m170108_233742_drop_tag_name_column_from_tags_display_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('tags_display', 'tag_name');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('tags_display', 'tag_name', $this->varchar(255));
    }
}
