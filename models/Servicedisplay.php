<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_display".
 *
 * @property integer $id
 * @property string $service_id
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
            [['service_id', 'user_id'], 'required'],
            [['service_id', 'user_id', 'office_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'service_id'    => 'Service Name',
            'user_id'       => 'User ID',
            'office_id'     => 'Office ID',
        ];
    }


     /**
     * Find the services by user ID
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
     * Find the services by office ID
     * 
     * @return mixed $servicedisplay
    */
    public function findByOfficeId($office_id){
        $servicedisplay = Servicedisplay::find()
        ->where(['office_id' => $office_id])
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
    * Checks if chosen service_id value in service_display table  value exists
    * @param string $service_post_name
    * @return integer
    */
    public function ServiceDisplayExists($service_post_service_id,$office_id){
        $exists = Servicedisplay::find()
        ->andwhere( [ 'service_id'    => $service_post_service_id ] )
        ->andwhere( [ 'user_id'         => Yii::$app->user->identity->id ] )
        ->andwhere( [ 'office_id'       => $office_id ] )
        ->exists(); 

        return $exists;

    }


    public function findColumnByAttribute($column,$attribute,$value){
         $services = Servicedisplay::find()
         ->select($column)
        ->where( [ $attribute    => $value ] )
        ->all(); 

        return $services;
    }
} // end class
