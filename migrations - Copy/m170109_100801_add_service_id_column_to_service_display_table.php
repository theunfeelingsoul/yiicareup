<?php

use yii\db\Migration;

/**
 * Handles adding service_id to table `service_display`.
 */
class m170109_100801_add_service_id_column_to_service_display_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('service_display', 'service_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('service_display', 'service_id'); 
    }
}
