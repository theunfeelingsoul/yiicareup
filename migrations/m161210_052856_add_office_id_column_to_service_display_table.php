<?php

use yii\db\Migration;

/**
 * Handles adding office_id to table `service_display`.
 */
class m161210_052856_add_office_id_column_to_service_display_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('service_display', 'office_id', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('service_display', 'office_id');
    }
}
