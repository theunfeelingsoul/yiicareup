<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $name
 * @property string $pass
 * @property string $mailadr
 * @property string $reg_key
 * @property string $Cname
 */
class Careupuser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'pass', 'mailadr', 'reg_key', 'Cname'], 'required'],
            [['name'], 'string', 'max' => 20],
            [['pass'], 'string', 'max' => 100],
            [['mailadr', 'reg_key'], 'string', 'max' => 64],
            [['Cname'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'pass' => 'Pass',
            'mailadr' => 'Mailadr',
            'reg_key' => 'Reg Key',
            'Cname' => 'Cname',
        ];
    }


     /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // return static::findOne(['access_token' => $token]);
        throw new \yii\base\NotSupportedException();
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        throw new \yii\base\NotSupportedException();
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
         throw new \yii\base\NotSupportedException();
    }

    public static function findByUsername($username){
        return self::findOne(['name'=>$username]);
    }

    public function validatePassword($password,$hash){
        // return $this->password ===$password;
        // check the hased password to the provided password
        if (Yii::$app->getSecurity()->validatePassword($password, $hash)) {
            // all good, logging user in
            return true;
        } else {
            // wrong password
            return false;
        }
    }
} // end class
