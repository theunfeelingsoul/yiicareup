<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "therapist".
 *
 * @property integer $tp_id
 * @property integer $of_id
 * @property string $tp_name
 * @property integer $tp_age
 * @property integer $tp_exp
 * @property integer $tp_skills
 * @property string $imgname
 * @property string $img
 */
class Therapist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'therapist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['of_id', 'tp_name', 'tp_age', 'tp_exp', 'tp_skills', 'imgname', 'img'], 'required'],
            [['of_id', 'tp_age', 'tp_exp', 'tp_skills'], 'integer'],
            [['img'], 'string'],
            [['tp_name'], 'string', 'max' => 15],
            [['imgname'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tp_id' => 'Tp ID',
            'of_id' => 'Of ID',
            'tp_name' => 'Tp Name',
            'tp_age' => 'Tp Age',
            'tp_exp' => 'Tp Exp',
            'tp_skills' => 'Tp Skills',
            'imgname' => 'Imgname',
            'img' => 'Img',
        ];
    }
}
