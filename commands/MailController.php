<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

class MailController extends Controller
{
    public $subject;
    public $text;
    public $email;
    public $user_id;

    public function actionIndex($arg1, $arg2, $arg3)
    {
        if($this->validate()) {
            $message = Yii::$app->mailer->compose();
            $message->setFrom(Yii::$app->params['adminEmail']);
            $message->setTo($this->email)
                ->setSubject($this->subject)
                ->setTextBody($this->text)
                ->setCharset('UTF-8')
                ->send();
        } else {
            echo "Check subject, text or email! -s, -t, -e" . PHP_EOL;
        }
    }

    private function validate() {
        return !empty($this->subject) && !empty($this->text) && !empty($this->email);
    }

    public function options($actionID)
    {
        return [
            'subject',
            'text',
            'email',
            'user_id'
        ];
    }

    public function optionAliases()
    {
        return [
            's' => 'subject',
            'm' => 'message',
            'e' => 'email',
            'id' => 'user_id'
        ];
    }
}
