<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "home_care".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $office_id
 * @property string $hmc_date
 */
class Homecare extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'home_care';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'office_id'], 'integer'],
            [['hmc_date'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'office_id' => 'Office ID',
            'hmc_date' => '訪問マッサージ',
        ];
    }

    /**
     * Returns the attributes of homecare in array format.
     * Excluding the id.
     * @return mixed
     */
    public function batchInsertAttributes(){
        return ['user_id', 'office_id', 'hmc_date'];
    }

    /**
     * Inserts multiple rows into home_care table.
     * @param mixed $data. Multidimention array. Each array made of the data 
     * Example :
     * $connection->createCommand()->batchInsert('user', ['name', 'age'], [
     *    ['Tom', 30],
     *    ['Jane', 20],
     *    ['Linda', 25],
     * ])->execute();
     *
     */
    public function batchInsertDates($data)
    {

        $table  = Homecare::tableName();
        $fields = Homecare::batchInsertAttributes();
        Yii::$app->db
                 ->createCommand()
                 ->batchInsert($table,$fields,$data)
                 ->execute();
    }


    /**
     * Find all records by user_id
     * 
     * @return mixed $offices 
    */
    public function findByOfficeId($id){
        $offices = Homecare::find()
        ->where(['office_id' => $id])
        ->orderBy(['id' => SORT_DESC])
        ->all(); 

        return $offices;
    }

} //end
