<?php

namespace app\controllers;

use yii\web\Controller;
use yii\helpers\Url;

class ActivityController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $url = Url::previous();

        return '';
    }
}
