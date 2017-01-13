<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skills_timetable".
 *
 * @property integer $id
 * @property string $day_and_time
 * @property integer $skid
 * @property string $user_id
 * @property string $status
 */
class Skillstimetable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skills_timetable';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['skid'], 'integer'],
            [['day_and_time', 'user_id', 'status'], 'string', 'max' => 255],
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
            'skid' => 'Skid',
            'user_id' => 'User ID',
            'status' => 'Status',
        ];
    }


    public function findByUserId(){
        $skillstimetable = Skillstimetable::find()
        ->where(['user_id' => Yii::$app->user->identity->id])
        ->all();

        return $skillstimetable;
    }


    public function findByUserIdAndGropupedBySkid(){
        $skillstimetable = Skillstimetable::find()
        ->where(['user_id' => Yii::$app->user->identity->id])
        ->groupBy(['skid'])
        ->all();

        return $skillstimetable;
    }

    public function findByUserIdAndOfficeIdAndGropupedBySkid($office_id){
        $skillstimetable = Skillstimetable::find()
        ->andwhere(['user_id' => Yii::$app->user->identity->id])
        ->andwhere(['office_id' => $office_id])
        ->groupBy(['skid'])
        ->all();

        return $skillstimetable;
    }


    public function findByUserIdAndSkid($skid){
        $skillstimetable = Skillstimetable::find()
        ->andwhere(['user_id' => Yii::$app->user->identity->id])
        ->andwhere(['skid' => $skid])
        ->all();

        return $skillstimetable;
    }


    public function findByUserIdAndSkidAndOfficeId($skid,$office_id){
        $skillstimetable = Skillstimetable::find()
        ->andwhere(['user_id' => Yii::$app->user->identity->id])
        ->andwhere(['skid' => $skid])
        ->andwhere(['office_id' => $office_id])
        ->all();

        return $skillstimetable;
    }

    public function findByUserIdAndSkidAndDayAndTimeAndOfficeId($skid,$day_and_time,$office_id){
        $skillstimetable = Skillstimetable::find()
        ->andwhere(['user_id' => Yii::$app->user->identity->id])
        ->andwhere(['skid' => $skid])
        ->andwhere(['day_and_time' => $day_and_time])
        ->andwhere(['office_id' => $office_id])
        ->one();

        return $skillstimetable;
    }

    public function findSkillStatusByDayAndTime($day_and_time){
        $skillstimetable = Skillstimetable::find()
        ->andwhere(['user_id' => Yii::$app->user->identity->id])
        ->andwhere(['day_and_time' => $day_and_time])
        ->one();

        return $skillstimetable->status;
    }


             /**
    * Checks if chosen service_name value in service_display table  value exists
    * @param string $service_post_name
    * @return integer
    */
    public function Exists($skid,$user_id,$day_and_time,$office_id){
        $exists = Skillstimetable::find()
        ->andWhere( [ 'skid' => $skid ] )
        ->andWhere( [ 'user_id' => $user_id ] )
        ->andWhere( [ 'day_and_time' => $day_and_time ] )
        ->andWhere( [ 'office_id' => $office_id ] )
        ->exists(); 

        return $exists;

    }


    /**
     * Inserts multiple rows into skills_timetable table.
     * @param mixed $data. Multidimention array. Each array made of the data 
     * Example :
     * $connection->createCommand()->batchInsert('user', ['name', 'age'], [
     *    ['Tom', 30],
     *    ['Jane', 20],
     *    ['Linda', 25],
     * ])->execute();
     *
     */
    public function batchInsertSkills($data)
    {

        $table  = skillstimetable::tableName();
        $fields = skillstimetable::batchInsertAttributes();
        Yii::$app->db
                 ->createCommand()
                 ->batchInsert($table,$fields,$data)
                 ->execute();
    }

    /**
     * Returns the attributes of office_timetable in array format.
     * Excluding the id.
     * @return mixed
     */
    public function batchInsertAttributes(){
        return ['day_and_time', 'skid','user_id', 'status', 'office_id'];
    }








} // end class
