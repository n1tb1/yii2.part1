<?php

namespace app\controllers;

use app\models\Activity;
use yii\web\Controller;
use yii\web\UploadedFile;

class ActivityController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Activity();

        if (\Yii::$app->request->isPost) {
            if ($model->load(\Yii::$app->request->post())) {
                if ($model->validate()) {

                    $model->files = UploadedFile::getInstances($model, 'files');

                    return $this->render('index', ['model' => $model, 'post' => true]);
                }
            }
        }

        return $this->render('index', ['model' => $model]);
    }
}
