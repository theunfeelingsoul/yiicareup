<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tags_display".
 *
 * @property integer $id
 * @property string $tag_name
 * @property string $user_id
 * @property string $office_id
 */
class Tagsdisplay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags_display';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_name', 'user_id', 'office_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_name' => 'Tag Name',
            'user_id' => 'User ID',
            'office_id' => 'Office ID',
        ];
    }


    /**
     * Check if tag_name exists
     * 
     * @param string $tag_post_name
     * @return integer $exists
    */
    public function tagNameExists($tag_post_name,$office_id){
        $exists = Tagsdisplay::find()
        ->andwhere( [ 'tag_name'   => $tag_post_name ] )
        ->andwhere( [ 'user_id' => Yii::$app->user->identity->id ] )
        ->andwhere( [ 'office_id'  => $office_id ] )
        ->exists(); 

        return $exists;
    }


    /**
     * Find tags by user id
     * 
     * @return mixed $tags_display
    */
    public function findByUserId(){
        $tags_display = Tagsdisplay::find()
        ->where(['user_id' => Yii::$app->user->identity->id])
        ->all();

        return $tags_display;
    }


    /**
     * Find tags by user id
     * 
     * @return mixed $tags_display
    */
    public function findByUserIdAndOfficeId($office_id){
        $tags_display       = Tagsdisplay::find()
        ->andwhere(['user_id'  => Yii::$app->user->identity->id])
        ->andwhere(['office_id'=> $office_id])
        ->all();

        return $tags_display;
    }

    public function findByServiceDisplayNameAndOfficeId($tag_name,$office_id){
        $tags_display = Tagsdisplay::find()
        ->andwhere(['user_id' => Yii::$app->user->identity->id]) // this can be ommited
        ->andwhere(['office_id' => $office_id])
        ->andwhere(['tag_name' => $tag_name])
        ->one();

        return $tags_display;
    }


}// end class
