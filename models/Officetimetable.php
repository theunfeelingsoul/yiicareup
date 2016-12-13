<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "office_timetable".
 *
 * @property integer $id
 * @property string $day_and_time
 * @property integer $user_id
 * @property string $status
 * @property string $office_id
 */
class Officetimetable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'office_timetable';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['day_and_time', 'status', 'office_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'day_and_time' => 'Day And Time',
            'user_id' => 'User ID',
            'status' => 'Status',
            'office_id' => 'Office ID',
        ];
    }


    public function findByUserIdAndOfficeId($office_id){

        $officetimetable = officetimetable::find()
        ->andwhere(['user_id' => Yii::$app->user->identity->id])
        ->andwhere(['office_id' => $office_id])
        ->all();

        return $officetimetable;
    }


    public function exists($day,$office_id){
         $exists = officetimetable::find()
        ->andwhere(['day_and_time' => $day])
        ->andwhere(['office_id' => $office_id])
        ->exists();

        return $exists;
    }

    public function findByDayAndOfficeId($day,$office_id){
         $office = officetimetable::find()
        ->andwhere(['day_and_time' => $day])
        ->andwhere(['office_id' => $office_id])
        ->one();

        return $office;
    }




} // end class
