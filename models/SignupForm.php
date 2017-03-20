<?php

namespace app\models;

use Yii;
use yii\base\Model;
//use Useradd;

/**
 * SignupForm is the model behind the signup form.
 */
class SignupForm extends Model
{
    public $email;
    public $signupuser;
    public $cid;
    public $password;
    public $verifyCode;
    public $subject;
    public $body;

//    private $_user = false;
    private $from = 'careup.server.master@gmail.com';

    public function attributeLabels()
    {
        // 日本語のラベルに書き換え
        return array(
            'email' => 'メールアドレスを入力してください。',
            'signupuser' => 'ユーザ名を入力してください（英字のみ）。',
            'cid' => '事業所番号を入力してください。',
            'password' => '希望パスワードを入力してください(英数字 8文字以上)。',
            // 'verifyCode' => '画像に書かれた文字を入力してください。',
        );
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // all required
            [['signupuser','email', 'password','cid'], 'required', 'message' => '{attribute} この項目は必須です。'],
            ['signupuser', 'unique'],
            ['signupuser', 'string', 'max' => 64],
            [['email', 'email'],'trim'],
            ['email', 'string', 'max' => 64],
            ['password', 'string', 'min' => 8, 'max' => 100],
            ['cid', 'string', 'max' => 30],
            // verifyCode needs to be entered correctly
            // ['verifyCode', 'captcha'],
        ];
    }

    /**
     * Signs user up
     *
     * @return Useradd|null the saved model or null if saving fails
     */

    public function signup()
    {
//        if (!$user->save()) {
        // if ($this->validate()) {
            $user = new Useradd();
            $user->name = $this->signupuser;
            //$user->setPassword($this->password);
            $user->pass = $user->hashPassword($this->password);
            $user->mailadr = $this->email;
            $user->Cname = $this->cid;
            $user->save();

            return $user;
        // }

        // return null;
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
    */
    public function sendMail($email)
    {
            return Yii::$app->mailer->compose()
            ->setTo($this->email)
            ->setFrom($this->from)
            ->setSubject('【新規登録】ケアアップ_認証メール')
            ->setTextBody('本文')
            ->setHtmlBody('

            ケアアップに新規ご登録いただき誠にありがとうございます。<br><br>

            下記リンクより事業所専用ページへログインを行い，本登録完了となります。<br>
            あなたのケアアップログインIDとパスワードは以下になります。本メールを大切に保管してください。<br><br>
            =======================<br>'.
            'ID：'.($this->signupuser).'<br>'.
            'パスワード：'.($this->password).'<br>
            ========================<br><br>'.
            '<h4><a href="http://careup.jp/yiicareup/web/index.php?r=site%2Flogin">メール認証を行いログイン
            </h4></a><br><br>

            ――――――――――――――――――<br>
            ■お問い合わせ■<br><br>

            ARMANS株式会社<br>
            TEL: 06 7713 0076<br><br>

            〒545-0052<br>
            大阪市阿倍野区阿倍野筋5-1-11<br>
            ――――――――――――――――――<br><br>

            ■利用規約■<br>
            <a href="http://careup.jp/yiicareup/web/index.php?r=site%2Fusepolicy">http://careup.jp/yiicareup/web/index.php?r=site%2Fusepolicy
            </a><br><br>

            ■個人情報保護方針■<br>
            <a href="http://careup.jp/yiicareup/web/index.php?r=site%2Fprivacypolicy">http://careup.jp/yiicareup/web/index.php?r=site%2Fprivacypolicy
            </a><br><br>

            ')
            ->send();
    }

}
