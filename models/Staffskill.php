<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff_skill".
 *
 * @property integer $id
 * @property string $skill
 */
class Staffskill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff_skill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['skill'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'skill' => 'Skill',
        ];
    }


    public function getNameByAttribute($attribute,$value){
        $Staff_skill_attribute = Staffskill::find()
            ->where([$attribute => $value])
            ->one();

        return $Staff_skill_attribute['skill']; 

    }



} // end class
