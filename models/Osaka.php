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


    public function findColumn($column){
        $service = Services::find()
        ->select($column)
        ->all();

        //  foreach ($allservices as $key => $value) {
        //    $data[]=$value->$column;
        // }

        return $data;
    }

    public function findCnamesByCattribute($cattribute){
        $cnames = Osaka::find()
        ->select('Cname,Cid')
        ->where(['Cattribute' => $cattribute])
        ->all();

        return $cnames;
    }


    public function getAreaNameById($id){
        $tag = Osaka::find()
        ->select('Cname')
        ->where(['Cid' => $id])
        ->one();

        return $tag['Cname'];
    }


    public function findDistinctCattributes(){
        $cattributes = Osaka::find()
        ->select('Cattribute')
        ->distinct()
        ->all();

        return $cattributes;

    }
}
