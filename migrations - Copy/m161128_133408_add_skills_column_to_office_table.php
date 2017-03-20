<?php

use yii\db\Migration;

/**
 * Handles adding skills to table `office`.
 */
class m161128_133408_add_skills_column_to_office_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('office', 'skills', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('office', 'skills');
    }
}
