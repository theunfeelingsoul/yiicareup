<?php

use yii\db\Migration;

/**
 * Handles the creation of table `short_stay`.
 */
class m170314_083754_create_short_stay_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('short_stay', [
            'id' => $this->primaryKey(),
            'date' => $this->string(),
            'user_id' => $this->integer(),
            'status' => $this->integer(),
            'office_id' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('short_stay');
    }
}
