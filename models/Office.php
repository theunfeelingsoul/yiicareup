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
* @property string $holiday
* @property string $location
* @property string $area
* @property integer $staff
* @property string $service
* @property string $imgname
* @property string $img
* @property string $user_id
* @property string $skills
* @property string $mon_9
* @property string $tue_9
* @property string $wed_9
* @property string $thu_9
* @property string $fri_9
* @property string $sat_9
* @property string $sun_9
* @property string $mon_10
* @property string $tue_10
* @property string $wed_10
* @property string $thu_10
* @property string $fri_10
* @property string $sat_10
* @property string $sun_10
* @property string $mon_11
* @property string $tue_11
* @property string $wed_11
* @property string $thu_11
* @property string $fri_11
* @property string $sat_11
* @property string $sun_11
* @property string $mon_12
* @property string $tue_12
* @property string $wed_12
* @property string $thu_12
* @property string $fri_12
* @property string $sat_12
* @property string $sun_12
* @property string $mon_13
* @property string $tue_13
* @property string $wed_13
* @property string $thu_13
* @property string $fri_13
* @property string $sat_13
* @property string $sun_13
* @property string $mon_14
* @property string $tue_14
* @property string $wed_14
* @property string $thu_14
* @property string $fri_14
* @property string $sat_14
* @property string $sun_14
* @property string $mon_15
* @property string $tue_15
* @property string $wed_15
* @property string $thu_15
* @property string $fri_15
* @property string $sat_15
* @property string $sun_15
* @property string $mon_16
* @property string $tue_16
* @property string $wed_16
* @property string $thu_16
* @property string $fri_16
* @property string $sat_16
* @property string $sun_16
* @property string $mon_17
* @property string $tue_17
* @property string $wed_17
* @property string $thu_17
* @property string $fri_17
* @property string $sat_17
* @property string $sun_17
* @property string $mon_18
* @property string $tue_18
* @property string $wed_18
* @property string $thu_18
* @property string $fri_18
* @property string $sat_18
* @property string $sun_18
* @property string $mon_19
* @property string $tue_19
* @property string $wed_19
* @property string $thu_19
* @property string $fri_19
* @property string $sat_19
* @property string $sun_19
* @property string $mon_20
* @property string $tue_20
* @property string $wed_20
* @property string $thu_20
* @property string $fri_20
* @property string $sat_20
* @property string $sun_20

 */



class Office extends \yii\db\ActiveRecord
{

    // will be used to store the image data
    public $imageFile;

    // check boxes attributes  
    public $mon_9;
    public $tue_9;
    public $wed_9;
    public $thu_9;
    public $fri_9;
    public $sat_9;
    public $sun_9;
    public $mon_10;
    public $tue_10;
    public $wed_10;
    public $thu_10;
    public $fri_10;
    public $sat_10;
    public $sun_10;
    public $mon_11;
    public $tue_11;
    public $wed_11;
    public $thu_11;
    public $fri_11;
    public $sat_11;
    public $sun_11;
    public $mon_12;
    public $tue_12;
    public $wed_12;
    public $thu_12;
    public $fri_12;
    public $sat_12;
    public $sun_12;
    public $mon_13;
    public $tue_13;
    public $wed_13;
    public $thu_13;
    public $fri_13;
    public $sat_13;
    public $sun_13;
    public $mon_14;
    public $tue_14;
    public $wed_14;
    public $thu_14;
    public $fri_14;
    public $sat_14;
    public $sun_14;
    public $mon_15;
    public $tue_15;
    public $wed_15;
    public $thu_15;
    public $fri_15;
    public $sat_15;
    public $sun_15;
    public $mon_16;
    public $tue_16;
    public $wed_16;
    public $thu_16;
    public $fri_16;
    public $sat_16;
    public $sun_16;
    public $mon_17;
    public $tue_17;
    public $wed_17;
    public $thu_17;
    public $fri_17;
    public $sat_17;
    public $sun_17;
    public $mon_18;
    public $tue_18;
    public $wed_18;
    public $thu_18;
    public $fri_18;
    public $sat_18;
    public $sun_18;
    public $mon_19;
    public $tue_19;
    public $wed_19;
    public $thu_19;
    public $fri_19;
    public $sat_19;
    public $sun_19;
    public $mon_20;
    public $tue_20;
    public $wed_20;
    public $thu_20;
    public $fri_20;
    public $sat_20;
    public $sun_20;

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
            [['id', 'Onum', 'Oname', 'leader', 'url', 'apeal', 'tel', 'fax', 'email', 'blanktime_s', 'blanktime_f', 'location', 'area', 'staff', 'service','user_id'], 'required'],
            // [['imgname'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg','maxSize' => 1024 * 1024 * 2],
            [['imageFile'], 'file', 'skipOnEmpty' => false,'extensions' => 'png, jpg','maxSize' => 1024 * 1024 * 2],
            [['id', 'staff','user_id'], 'integer'],
            //[['area', 'service'], 'string','allowArray' => true],
            [['blanktime_s', 'blanktime_f'], 'safe'],
            [['img'], 'string'],
            // [['mon_9', 'tue_9', 'wed_9', 'thu_9', 'fri_9', 'sat_9', 'sun_9', 'mon_10', 'tue_10', 'wed_10', 'thu_10', 'fri_10', 'sat_10', 'sun_10', 'mon_11', 'tue_11', 'wed_11', 'thu_11', 'fri_11', 'sat_11', 'sun_11', 'mon_12', 'tue_12', 'wed_12', 'thu_12', 'fri_12', 'sat_12', 'sun_12', 'mon_13', 'tue_13', 'wed_13', 'thu_13', 'fri_13', 'sat_13', 'sun_13', 'mon_14', 'tue_14', 'wed_14', 'thu_14', 'fri_14', 'sat_14', 'sun_14', 'mon_15', 'tue_15', 'wed_15', 'thu_15', 'fri_15', 'sat_15', 'sun_15', 'mon_16', 'tue_16', 'wed_16', 'thu_16', 'fri_16', 'sat_16', 'sun_16', 'mon_17', 'tue_17', 'wed_17', 'thu_17', 'fri_17', 'sat_17', 'sun_17', 'mon_18', 'tue_18', 'wed_18', 'thu_18', 'fri_18', 'sat_18', 'sun_18', 'mon_19', 'tue_19', 'wed_19', 'thu_19', 'fri_19', 'sat_19', 'sun_19', 'mon_20', 'tue_20', 'wed_20', 'thu_20', 'fri_20', 'sat_20', 'sun_20'], 'string'],
            [['holiday'], 'string'],
            [['skills'], 'string'],
            [['Onum', 'Oname'], 'string', 'max' => 20],
            [['leader'], 'string', 'max' => 10],
            [['url'], 'string', 'max' => 100],
            [['apeal'], 'string', 'max' => 150],
            [['tel', 'fax'], 'string', 'max' => 15],
            [['email', 'location'], 'string', 'max' => 30],
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
            'id' => 'ID',
            'Onum' => 'Onum',
            'Oname' => 'Company Name',
            'leader' => 'Person In charge',
            'url' => 'Movie Url',
            'apeal' => 'Appeal (About 200 words)',
            'tel' => 'Tel',
            'fax' => 'Fax',
            'email' => 'Email',
            'blanktime_s' => 'Blanktime S',
            'blanktime_f' => 'Blanktime F',
            'holiday' => 'Holiday',
            'location' => 'Address',
            'area' => 'Area',
            'staff' => 'Staff',
            'service' => 'Service',
            'imgname' => 'Imgname',
            'img' => 'Img',
            'user_id' => 'User ID',
            'skills' => 'Skills',
            'mon_9' => 'mon_9',
            'tue_9' => 'tue_9',
            'wed_9' => 'wed_9',
            'thu_9' => 'thu_9',
            'fri_9' => 'fri_9',
            'sat_9' => 'sat_9',
            'sun_9' => 'sun_9',
            'mon_10' => 'mon_10',
            'tue_10' => 'tue_10',
            'wed_10' => 'wed_10',
            'thu_10' => 'thu_10',
            'fri_10' => 'fri_10',
            'sat_10' => 'sat_10',
            'sun_10' => 'sun_10',
            'mon_11' => 'mon_11',
            'tue_11' => 'tue_11',
            'wed_11' => 'wed_11',
            'thu_11' => 'thu_11',
            'fri_11' => 'fri_11',
            'sat_11' => 'sat_11',
            'sun_11' => 'sun_11',
            'mon_12' => 'mon_12',
            'tue_12' => 'tue_12',
            'wed_12' => 'wed_12',
            'thu_12' => 'thu_12',
            'fri_12' => 'fri_12',
            'sat_12' => 'sat_12',
            'sun_12' => 'sun_12',
            'mon_13' => 'mon_13',
            'tue_13' => 'tue_13',
            'wed_13' => 'wed_13',
            'thu_13' => 'thu_13',
            'fri_13' => 'fri_13',
            'sat_13' => 'sat_13',
            'sun_13' => 'sun_13',
            'mon_14' => 'mon_14',
            'tue_14' => 'tue_14',
            'wed_14' => 'wed_14',
            'thu_14' => 'thu_14',
            'fri_14' => 'fri_14',
            'sat_14' => 'sat_14',
            'sun_14' => 'sun_14',
            'mon_15' => 'mon_15',
            'tue_15' => 'tue_15',
            'wed_15' => 'wed_15',
            'thu_15' => 'thu_15',
            'fri_15' => 'fri_15',
            'sat_15' => 'sat_15',
            'sun_15' => 'sun_15',
            'mon_16' => 'mon_16',
            'tue_16' => 'tue_16',
            'wed_16' => 'wed_16',
            'thu_16' => 'thu_16',
            'fri_16' => 'fri_16',
            'sat_16' => 'sat_16',
            'sun_16' => 'sun_16',
            'mon_17' => 'mon_17',
            'tue_17' => 'tue_17',
            'wed_17' => 'wed_17',
            'thu_17' => 'thu_17',
            'fri_17' => 'fri_17',
            'sat_17' => 'sat_17',
            'sun_17' => 'sun_17',
            'mon_18' => 'mon_18',
            'tue_18' => 'tue_18',
            'wed_18' => 'wed_18',
            'thu_18' => 'thu_18',
            'fri_18' => 'fri_18',
            'sat_18' => 'sat_18',
            'sun_18' => 'sun_18',
            'mon_19' => 'mon_19',
            'tue_19' => 'tue_19',
            'wed_19' => 'wed_19',
            'thu_19' => 'thu_19',
            'fri_19' => 'fri_19',
            'sat_19' => 'sat_19',
            'sun_19' => 'sun_19',
            'mon_20' => 'mon_20',
            'tue_20' => 'tue_20',
            'wed_20' => 'wed_20',
            'thu_20' => 'thu_20',
            'fri_20' => 'fri_20',
            'sat_20' => 'sat_20',
            'sun_20' => 'sun_20'
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
