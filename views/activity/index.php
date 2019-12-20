<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
      <?= Html::a('Create Activity', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            [
                'attribute' => 'authorName',
                'value' => function (\app\models\Activity $model) {
                    return $model->author->username;
                }
            ],
            [
                'attribute' => 'started_at',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'started_at',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoClose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy'
                    ]
                ]),
                'label' => 'Начало',
                'value' => function (\app\models\Activity $model) {
                    return Yii::$app->formatter->asDatetime($model->started_at);
                }
            ],
            [
                'attribute' => 'finished_at',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'finished_at',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoClose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy'
                    ]

                ]),
                'label' => 'Конец',
                'value' => function (\app\models\Activity $model) {
                    return Yii::$app->formatter->asDatetime($model->finished_at);
                }
            ],
            [
                'attribute' => 'authorEmail',
                'format' => 'raw',
                'value' => function (\app\models\Activity $model) {
                    return Html::a($model->author->email, ['/user/view', 'id' => $model->author->id]);
                }
            ],
            //'author_id',
            //'main',
            //'cycle',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
