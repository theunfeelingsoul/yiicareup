<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property integer $Skid
 * @property integer $Skgroup
 * @property string $Sktag
 * @property string $Skname
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Skgroup', 'Sktag', 'Skname'], 'required'],
            [['Skgroup'], 'integer'],
            [['Sktag'], 'string', 'max' => 10],
            [['Skname'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Skid' => 'Skid',
            'Skgroup' => 'Skgroup',
            'Sktag' => 'Sktag',
            'Skname' => 'Skname',
        ];
    }

    public function findTagsById($id){
         $tags = Tags::find()
        ->where(['Skid' => $id])
        ->one();

        $t=$tags->Skname;
        return $t;
    }

    public function findTagSkidBySkname($skname)
    {
        $tag = Tags::find()
        ->where(['Skname' => $skname])
        ->one();

        $skid=$tag->Skid;
        return $skid;
    }

    public function getTagNameByTagId($tag_id){
        $tag = Tags::find()
        ->select('Skname')
        ->where(['Skid' => $tag_id])
        ->one();

        return $tag['Skname'];
    }


    public function findDistinctByAttribute($attribute){
         $tags = Tags::find()
         ->select($attribute)
         ->distinct()
         ->all();

         return $tags;
    }

    // public function findCellByAttributeValue($attribute,$column,$value){
    //     $service = Services::find()
    //     ->select($attribute)
    //     ->where([$column => $value])
    //     ->one();

    //     return $service[$attribute];

    // }

    public function findByColumn($column,$attribute,$value){
         $Tags = Tags::find()
        ->select($column)
        ->where([$attribute => $value])
        ->all();

        return $Tags;
    }



}// end class
