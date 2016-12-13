<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_display".
 *
 * @property integer $id
 * @property string $service_name
 * @property string $user_id
 * @property string $office_id
 */
class Servicedisplay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_display';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_name', 'user_id'], 'required'],
            [['service_name', 'user_id', 'office_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_name' => 'Service Name',
            'user_id' => 'User ID',
            'office_id' => 'Office ID',
        ];
    }


     /**
     * Find the service by user ID
     * 
     * @return mixed $servicedisplay
    */
    public function findByUserId(){
        $servicedisplay = Servicedisplay::find()
        ->where(['user_id' => Yii::$app->user->identity->id])
        ->all();

        return $servicedisplay;
    }

     /**
     * Find the service by user ID
     * 
     * @return mixed $servicedisplay
    */
    public function findByUserIdAndOfficeId($office_id){
        $servicedisplay = Servicedisplay::find()
        ->andwhere(['user_id' => Yii::$app->user->identity->id])
        ->andwhere(['office_id' => $office_id])
        ->all();

        return $servicedisplay;
    }


    /**
     * Find the service by user ID
     * 
     * @return mixed $servicedisplay
    */
    public function findByServiceDisplayNameAndOfficeId($service_name,$office_id){
        $servicedisplay = Servicedisplay::find()
        ->andwhere(['user_id' => Yii::$app->user->identity->id]) // this can be ommited
        ->andwhere(['office_id' => $office_id])
        ->andwhere(['service_name' => $service_name])
        ->one();

        return $servicedisplay;
    }


     /**
    * Checks if chosen service_name value in service_display table  value exists
    * @param string $service_post_name
    * @return integer
    */
    public function ServiceDisplayExists($service_post_name,$office_id){
        $exists = Servicedisplay::find()
        ->andwhere( [ 'service_name'    => $service_post_name ] )
        ->andwhere( [ 'user_id'         => Yii::$app->user->identity->id ] )
        ->andwhere( [ 'office_id'       => $office_id ] )
        ->exists(); 

        return $exists;

    }
} // end class
