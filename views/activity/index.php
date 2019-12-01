<?php

/* @var $this yii\web\View */

/* @var $model app\models\Activity */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;


$this->title = 'Событие';
$this->params['breadcrumbs'][] = ['label' => $model->getAttributeLabel('calendar'), 'url' => 'site/calendar'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity">
  <h1><?= Html::encode($this->title) ?></h1>

    <?php

    echo isset($post) ? Alert::widget([
        'options' => [
            'class' => 'alert-success',
        ],
        'body' => 'Validated!',
    ]) : '';


    $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'action' => ['index'],
        'enableClientValidation' => false,
        'method' => 'post',
    ]);

    echo $form->field($model, 'title')->textInput();
    echo $form->field($model, 'priority')->checkbox();
    echo $form->field($model, 'start')->textInput();
    echo $form->field($model, 'end')->textInput();
    echo $form->field($model, 'body')->textarea();
    echo $form->field($model, 'status')->dropDownList([
        '1' => 'Включено',
        '0' => 'Выключено'
    ]);

    echo $form->field($model, 'files[]')->fileInput(['multiple' => true]);

    echo Html::submitButton('Отправить',
        ['class' => 'btn btn-success']);

    ActiveForm::end();
    ?>

</div>
