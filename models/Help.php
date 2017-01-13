<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "help".
 *
 * @property integer $id
 * @property string $stuff
 */
class Help extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'help';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stuff'], 'required'],
            [['stuff'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stuff' => 'Stuff',
        ];
    }
}
