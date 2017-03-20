<?php

use yii\db\Migration;

class m170108_222231_alter_skill_id_column_to_tag_id_column_in__tags_display_table extends Migration
{
    public function up()
    {
        $this-> renameColumn  ( 'tags_display', 'skill_id', 'tag_id' );
    }

    public function down()
    {
        $this-> renameColumn  ( 'tags_display', 'tag_id', 'skill_id' );
    }

   
}
