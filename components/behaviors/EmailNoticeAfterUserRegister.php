<?php
/**
 * Created by PhpStorm.
 * User: good
 * Date: 03/01/2020
 * Time: 13:10
 */

namespace app\components\behaviors;
use Yii;
use yii\db\ActiveRecord;
use yii\base\Behavior;

class EmailNoticeAfterUserRegister extends Behavior
{
    public $username;
    public $email;
    public $password;

    public function events() {
        return [
            ActiveRecord::EVENT_AFTER_VALIDATE => 'afterValidate',
        ];
    }

    public function afterValidate() {
        $message = Yii::$app->mailer->compose();
        $message->setFrom(Yii::$app->params['adminEmail']);
        $message->setTo($this->owner->email)
            ->setSubject('Thanks for registering, your password in the message.')
            ->setTextBody($this->getTextBody())
            ->setCharset('UTF-8')
            ->send();
    }

    public function getTextBody() {
        return "Hello " . $this->owner->username . "," . PHP_EOL . "Your password is: " . $this->owner->password;
    }
}