<?php

namespace app\models;
use yii\web\UploadedFile;


use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property integer $id
 * @property string $staff_name
 * @property string $staff_skill
 * @property string $staff_years_of_exp
 * @property integer $user_id
 * @property integer $office_id
 * @property string $image_path
 *
 * @property Office $office
 * @property User $user
 */
class Staff extends \yii\db\ActiveRecord
{   
    // will be used to store the image data
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'office_id'], 'integer'],
            [['staff_name', 'staff_skill', 'staff_years_of_exp', 'image_path','appeal'], 'string'],
            [['office_id'], 'exist', 'skipOnError' => true, 'targetClass' => Office::className(), 'targetAttribute' => ['office_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                    => 'ID',
            'staff_name'            => '名',
            'staff_skill'           => '資格',
            'staff_years_of_exp'    => '経験年数',
            'user_id'               => 'User ID',
            'office_id'             => 'Office ID',
            'image_path'            => '画像',
            'appeal'                => '自己PR',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffice()
    {
        return $this->hasOne(Office::className(), ['id' => 'office_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
    * Saves the uploaded image to the a folder
    * If upload is succesful it returns true
    */
    public function upload($img_name)
    {   

        if ($this->imageFile->saveAs('img/uploads/staff/' . $img_name . '.' . $this->imageFile->extension)) {
            return true;
        }else{
            return false;
        }
       
    } // end upload()


    /**
     * Find all records by user_id
     * 
     * @return mixed $offices 
    */
    public function findByOfficeId($id){

        if ($id===false) {
            $offices = Staff::find()
            ->all(); 
        }else{
            $offices = Staff::find()
            ->where(['office_id' => $id])
            ->all(); 

        }
        
        return $offices;
    }


} // end class
