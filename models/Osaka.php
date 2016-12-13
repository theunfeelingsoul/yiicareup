<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "osaka".
 *
 * @property integer $Cid
 * @property string $Cattribute
 * @property string $Cname
 */
class Osaka extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'osaka';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Cattribute', 'Cname'], 'required'],
            [['Cattribute', 'Cname'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Cid' => 'Cid',
            'Cattribute' => 'Cattribute',
            'Cname' => 'Cname',
        ];
    }
}
