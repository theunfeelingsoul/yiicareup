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

    /**
     * Returns the attributes of office_timetable in array format.
     * Excluding the id.
     * @return mixed
     */
    public function batchInsertAttributes(){
        return ['day_and_time', 'user_id', 'status', 'office_id'];
    }


    public function findByUserIdAndOfficeId($office_id){

        $officetimetable = officetimetable::find()
        ->andwhere(['user_id' => Yii::$app->user->identity->id])
        ->andwhere(['office_id' => $office_id])
        ->all();

        return $officetimetable;
    }


    public function exists($day,$office_id)
    {
         $exists = officetimetable::find()
        ->andwhere(['day_and_time' => $day])
        ->andwhere(['office_id' => $office_id])
        ->exists();

        return $exists;
    }

    public function findByDayAndOfficeId($day,$office_id)
    {
         $office = officetimetable::find()
        ->andwhere(['day_and_time' => $day])
        ->andwhere(['office_id' => $office_id])
        ->one();

        return $office;
    }


    /**
     * Inserts multiple rows into office_timetable table.
     * @param mixed $data. Multidimention array. Each array made of the data 
     * Example :
     * $connection->createCommand()->batchInsert('user', ['name', 'age'], [
     *    ['Tom', 30],
     *    ['Jane', 20],
     *    ['Linda', 25],
     * ])->execute();
     *
     */
    public function batchInsertTimes($data)
    {

        $table  = officeTimetable::tableName();
        $fields = officeTimetable::batchInsertAttributes();
        Yii::$app->db
                 ->createCommand()
                 ->batchInsert($table,$fields,$data)
                 ->execute();
    }




} // end class
