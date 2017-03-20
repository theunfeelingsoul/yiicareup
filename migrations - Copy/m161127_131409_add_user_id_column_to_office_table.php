<?php

use yii\db\Migration;

/**
 * Handles adding user_id to table `office`.
 */
class m161127_131409_add_user_id_column_to_office_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('office', 'user_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('office', 'user_id');
    }
}
