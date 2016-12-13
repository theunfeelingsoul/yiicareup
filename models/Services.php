<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property integer $Sid
 * @property integer $Sgroup
 * @property string $Sattribute
 * @property string $Sname
 * @property string $Simg
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Sgroup', 'Sattribute', 'Sname', 'Simg'], 'required'],
            [['Sgroup'], 'integer'],
            [['Simg'], 'string'],
            [['Sattribute', 'Sname'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Sid' => 'Sid',
            'Sgroup' => 'Sgroup',
            'Sattribute' => 'Sattribute',
            'Sname' => 'Sname',
            'Simg' => 'Simg',
        ];
    }


    public function findBySid($Sid){
        $service = Services::find()
        ->where(['Sid' => $Sid])
        ->one();

        return $service;
    }


} // end class
