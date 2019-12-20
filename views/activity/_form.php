<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'started_at')->widget(
        DatePicker::className(),
        [
            'options' => ['placeholder' => 'Выберете дату начала'],
            'language' => 'ru',
            'pluginOptions' => [
                'autoClose' => true,
                'todayHighlight' => true,
                'format' => 'dd.mm.yyyy'
            ]
        ]) ?>

    <?= $form->field($model, 'finished_at')->widget(
        DatePicker::className(),
        [
            'options' => ['placeholder' => 'Выберете дату окончания'],
            'language' => 'ru',
            'pluginOptions' => [
                'autoClose' => true,
                'todayHighlight' => true,
                'format' => 'dd.mm.yyyy'
            ]
        ]) ?>

    <?= $form->field($model, 'main')->checkbox() ?>

    <?= $form->field($model, 'cycle')->checkbox() ?>

  <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>

    <?php ActiveForm::end(); ?>

</div>
