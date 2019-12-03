<?php

/* @var $this yii\web\View */
/* @var $model app\models\Day */

use yii\helpers\Html;

$this->title = $model->getAttributeLabel('title');
$this->params['breadcrumbs'][] = [ 'label' => $model->getAttributeLabel('calendar'), 'url' => 'site/calendar'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daily-tasks">
    <h1><?= Html::encode($this->title) ?></h1>

    <table class="table table-borderless">
      <thead>
        <tr>
          <th><?= $model->getAttributeLabel('author'); ?></th>
          <th><?= $model->getAttributeLabel('activityName'); ?></th>
          <th width="20%"><?= $model->getAttributeLabel('action'); ?></th>
        </tr>
      </thead>
      <tbody>
      <?php for ($i = 0; $i < 10; $i++) : ?>
        <tr>
          <td>Test</td>
          <td>Task for the day # <?= $i; ?></td>
          <td>
              <?= Html::button('edit', ['class' => 'btn btn-default']) ?>
              <?= Html::button('delete', ['class' => 'btn btn-danger']) ?>
          </td>
        </tr>
      <?php endfor; ?>
      </tbody>
    </table>
</div>
