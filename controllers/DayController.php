<?php

namespace app\controllers;

use app\models\Day;
use yii\web\Controller;

class DayController extends Controller
{
    /**
     * Displays day tasks page.
     *
     * @return string
     */

    public function actionIndex()
    {
        $model = new Day();

        return $this->render('index', ['model' => $model]);
    }
}
