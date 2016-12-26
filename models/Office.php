<?php

namespace app\models;
use yii\web\UploadedFile;
use app\models\Servicedisplay;

use Yii;

/**
 * This is the model class for table "office".
 *
* @property integer $id
* @property string $Onum
* @property string $Oname
* @property string $leader
* @property string $url
* @property string $apeal
* @property string $tel
* @property string $fax
* @property string $email
* @property string $blanktime_s
* @property string $blanktime_f
* @property string $location
* @property string $area
* @property integer $staff
* @property string $service
* @property string $imgname
* @property string $img
* @property string $user_id
* @property string $skills
 */



class Office extends \yii\db\ActiveRecord
{

    // will be used to store the image data
    public $imageFile;
    public $imgx;

    public $times=array('mon_9', 'tue_9', 'wed_9', 'thu_9', 'fri_9', 'sat_9', 'sun_9', 'mon_10', 'tue_10', 'wed_10', 'thu_10', 'fri_10', 'sat_10', 'sun_10', 'mon_11', 'tue_11', 'wed_11', 'thu_11', 'fri_11', 'sat_11', 'sun_11', 'mon_12', 'tue_12', 'wed_12', 'thu_12', 'fri_12', 'sat_12', 'sun_12', 'mon_13', 'tue_13', 'wed_13', 'thu_13', 'fri_13', 'sat_13', 'sun_13', 'mon_14', 'tue_14', 'wed_14', 'thu_14', 'fri_14', 'sat_14', 'sun_14', 'mon_15', 'tue_15', 'wed_15', 'thu_15', 'fri_15', 'sat_15', 'sun_15', 'mon_16', 'tue_16', 'wed_16', 'thu_16', 'fri_16', 'sat_16', 'sun_16', 'mon_17', 'tue_17', 'wed_17', 'thu_17', 'fri_17', 'sat_17', 'sun_17', 'mon_18', 'tue_18', 'wed_18', 'thu_18', 'fri_18', 'sat_18', 'sun_18', 'mon_19', 'tue_19', 'wed_19', 'thu_19', 'fri_19', 'sat_19', 'sun_19', 'mon_20', 'tue_20', 'wed_20', 'thu_20', 'fri_20', 'sat_20', 'sun_20');
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'office';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Onum', 'Oname', 'leader', 'url', 'apeal', 'tel', 'fax', 'email', 'blanktime_s', 'blanktime_f', 'location', 'area', 'staff', 'service','user_id','skills'], 'required'],
            // [['imgname'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg','maxSize' => 1024 * 1024 * 2],
            [['imageFile'], 'file', 'skipOnEmpty' => false,'extensions' => 'png, jpg'],
            [['id', 'staff','user_id'], 'integer'],
            [['blanktime_s', 'blanktime_f'], 'safe'],
            [['img'], 'string'],
            [['Onum', 'Oname'], 'string', 'max' => 20],
            [['leader'], 'string', 'max' => 10],
            [['url'], 'string', 'max' => 100],
            [['apeal'], 'string', 'max' => 150],
            [['tel', 'fax'], 'string', 'max' => 15],
            ['email', 'email'],
            [['location'], 'string', 'max' => 30],
            [['imgname'], 'string', 'max' => 50],
        ];
    }


      // this helps ignore img_path when updating
    // i.e. making it not required
    // public function scenarios()
    // {
    //     $scenarios = parent::scenarios();
    //     $scenarios['update'] = ['id', 'Onum', 'Oname', 'leader', 'url', 'apeal', 'tel', 'fax', 'email', 'blanktime_s', 'blanktime_f', 'location', 'area', 'staff', 'service','user_id'];// only validate these attibutes on update
    //     return $scenarios;
    // }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'Onum'          => 'Onum',
            'Oname'         => 'Company Name',
            'leader'        => 'Person In charge',
            'url'           => 'Movie Url',
            'apeal'         => 'Appeal (About 200 words)',
            'tel'           => 'Tel',
            'fax'           => 'Fax',
            'email'         => 'Email',
            'blanktime_s'   => 'Blanktime S',
            'blanktime_f'   => 'Blanktime F',
            'location'      => 'Address',
            'area'          => 'Area',
            'staff'         => 'Staff',
            'service'       => 'Service',
            'imgname'       => 'Imgname',
            'img'           => 'Img',
            'user_id'       => 'User ID',
            'skills'        => 'Skills',
        ];
    }

    /**
    * Saves the uploaded image to the a folder
    * If upload is succesful it returns true
    */
    public function upload($img_name)
    {   

        if ($this->imageFile->saveAs('img/uploads/' . $img_name . '.' . $this->imageFile->extension)) {
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
    public function findByUserId(){
        $offices = Office::find()
        ->where(['user_id' => Yii::$app->user->identity->id])
        ->all(); 

        return $offices;
    }

    public function findLatestIdByUserId(){
        $office = Office::find()
        ->where(['user_id' => Yii::$app->user->identity->id])
        ->orderBy(['id' => SORT_DESC])
        ->one(); 

        return $office->id;

    }

    /**
     * Check if at least one office for a user exists
     * 
     * @param string $tag_post_name
     * @return integer $exists
    */
    public function atLeastOneExists(){
        $exists = Office::find()
        ->where(['user_id' => Yii::$app->user->identity->id])
        ->exists(); 

        return $exists;
    }




} // end class
