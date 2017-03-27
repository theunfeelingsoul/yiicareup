<?php

namespace app\models;
use yii\web\UploadedFile;
use app\models\Servicedisplay;
use app\models\Tags;

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
* @property string $location
* @property string $area
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
    public $Officetimetable_search;

    public $imgx;

    // message when a search is empty
    public $msg_empty_search = "条件に当てはまる事業所は現在登録されておりません。 別の条件でお試しください。";

    // public $times=array('mon_9', 'tue_9', 'wed_9', 'thu_9', 'fri_9', 'sat_9', 'sun_9', 'mon_10', 'tue_10', 'wed_10', 'thu_10', 'fri_10', 'sat_10', 'sun_10', 'mon_11', 'tue_11', 'wed_11', 'thu_11', 'fri_11', 'sat_11', 'sun_11', 'mon_12', 'tue_12', 'wed_12', 'thu_12', 'fri_12', 'sat_12', 'sun_12', 'mon_13', 'tue_13', 'wed_13', 'thu_13', 'fri_13', 'sat_13', 'sun_13', 'mon_14', 'tue_14', 'wed_14', 'thu_14', 'fri_14', 'sat_14', 'sun_14', 'mon_15', 'tue_15', 'wed_15', 'thu_15', 'fri_15', 'sat_15', 'sun_15', 'mon_16', 'tue_16', 'wed_16', 'thu_16', 'fri_16', 'sat_16', 'sun_16', 'mon_17', 'tue_17', 'wed_17', 'thu_17', 'fri_17', 'sat_17', 'sun_17', 'mon_18', 'tue_18', 'wed_18', 'thu_18', 'fri_18', 'sat_18', 'sun_18', 'mon_19', 'tue_19', 'wed_19', 'thu_19', 'fri_19', 'sat_19', 'sun_19', 'mon_20', 'tue_20', 'wed_20', 'thu_20', 'fri_20', 'sat_20', 'sun_20');

    public $times=array('mon_9', 'tue_9', 'wed_9', 'thu_9', 'fri_9', 'sat_9', 'sun_9', 'mon_10', 'tue_10', 'wed_10', 'thu_10', 'fri_10', 'sat_10', 'sun_10', 'mon_11', 'tue_11', 'wed_11', 'thu_11', 'fri_11', 'sat_11', 'sun_11', 'mon_12', 'tue_12', 'wed_12', 'thu_12', 'fri_12', 'sat_12', 'sun_12', 'mon_13', 'tue_13', 'wed_13', 'thu_13', 'fri_13', 'sat_13', 'sun_13', 'mon_14', 'tue_14', 'wed_14', 'thu_14', 'fri_14', 'sat_14', 'sun_14', 'mon_15', 'tue_15', 'wed_15', 'thu_15', 'fri_15', 'sat_15', 'sun_15', 'mon_16', 'tue_16', 'wed_16', 'thu_16', 'fri_16', 'sat_16', 'sun_16', 'mon_17', 'tue_17', 'wed_17', 'thu_17', 'fri_17', 'sat_17', 'sun_17', 'mon_18', 'tue_18', 'wed_18', 'thu_18', 'fri_18', 'sat_18', 'sun_18', 'mon_19', 'tue_19', 'wed_19', 'thu_19', 'fri_19', 'sat_19', 'sun_19', 'mon_20', 'tue_20', 'wed_20', 'thu_20', 'fri_20', 'sat_20', 'sun_20', 'mon_21', 'tue_21', 'wed_21', 'thu_21', 'fri_21', 'sat_21', 'sun_21');
    
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
//           Must input items : "Oname","leader","tel","location","area","service"
            [['Onum', 'Oname', 'service', 'leader', 'tel', 'location', 'area', 'skills', 'user_id'], 'required'],
//            [['Oname','Onum', 'leader', 'url', 'apeal', 'tel', 'fax', 'email', 'location', 'area', 'user_id','skills','service'], 'required'],

            [['imageFile'], 'file', 'skipOnEmpty' => true,'extensions' => 'png, jpg'],
            [['id','user_id'], 'integer'],
            [['leader','tel','fax','url'], 'string', 'max' => 256],
            [['apeal','imgname','Oname'], 'string'],
            ['email', 'email'],

        ];
    }





    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'Onum'          => '事業所番号(必須)',
            'Oname'         => '事業所名(必須)',
            'leader'        => '担当者(必須)',
            'url'           => '事業所ホームページURL',
            'apeal'         => 'アピール文（１５０字程度）',
            'tel'           => '電話番号(必須)',
            'fax'           => 'Fax',
            'email'         => 'メールアドレス',
            'location'      => '住所(必須)',
            'area'          => '対応可能なエリア(必須)',
            'service'       => 'サービス(必須)',
            'imgname'       => '画像',
            'user_id'       => 'ユーザID',
            'skills'        => 'アピールタグ(必須)',
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
        ->orderBy(['id' => SORT_DESC])
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

    // public function findUserIdByOfficeId($office_id){
    //  $data = Office::find()
    //     ->where([$attribute => $value])
    //     ->all(); 

    //     return $data;
    // }

    public function findByAttribute($attribute,$value){
        $data = Office::find()
        ->where([$attribute => $value])
        ->all();

        return $data;
    }
    public function findLikeAttribute($attribute,$value){
        $data = Office::find()
        ->where(['like', $attribute, $value])
        ->all();

        return $data;
    }


    /**
     * String given are tag ids.
     * Explode the string, get the tag names using the $model_tags->getTagNameByTagId() method
     * 
     * @param  string $string
     * @return string $tag_names_string or "No Skills"
    */
    public function findTagNamesFromString($string){
        $model_tags= new Tags();
        if (!empty($string)) {
            $string_array = explode(',', $string);
            foreach ($string_array as $key => $tag_id) {
                $tag_names_array[] = $model_tags->getTagNameByTagId($tag_id);
            }

            //implode array into string
            return $tag_names_string = implode(' , ', $tag_names_array);

        }else{
            return "選択されたタグに該当する事業所がありません";
        }
    }

    /**
     * String given are area ids. 
     * Explode the string, get the area names using the $model_tags->getAreaNameById() method
     * 
     * @param  string $string
     * @return string $area_names_array or "No Area"
    */
    public function findAreaNamesFromString($string){
        $model_location = new Osaka();

        if (!empty($string)) {
            $string_array = explode(',', $string);
            foreach ($string_array as $key => $location_id) {
                $area_names_array[] = $model_location->getAreaNameById($location_id);
            }

            // implode array into string
            return implode(',', $area_names_array);
        }else{
            return "選択されたエリアに該当する事業所がありません";
        }
    }

    /**
     * String given are service ids. 
     * Explode the string, get the service names using the $model_tags->getServiceNameByServiceId() method
     * 
     * @param  string $string
     * @return string $service_names_array or "No Services"
    */
    public function findServiceNamesFromString($string){
        $model_services = new Services();

        if (!empty($string)) {
            $string_array = explode(',', $string);
            foreach ($string_array as $key => $location_id) {
                $service_names_array[] = $model_services->getServiceNameByServiceId($location_id);
            }   

            // implode array into string
            return implode(' , ', $service_names_array);
        }else{
            return "選択されたサービスに該当する事業所がありません";
        }
    }


        /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffice_timetable()
    {
        return $this->hasMany(Officetimetable::className(), ['office_id' => 'id']);
    }

        /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags_display()
    {
        return $this->hasMany(Tagsdisplay::className(), ['office_id' => 'id']);
    }

        /**
     * @return \yii\db\ActiveQuery
     */
    public function getService_display()
    {
        return $this->hasMany(Servicedisplay::className(), ['office_id' => 'id']);
    }




} // end class
