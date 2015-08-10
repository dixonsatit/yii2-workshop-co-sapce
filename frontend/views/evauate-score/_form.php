<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EvauateScore */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evauate-score-form">

    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>เกณฑ์ The Must</th>
          <th>เกณฑ์ The Best</th>
          <th>ไม่ประเมิน</th>
          <th>ไม่ผ่าน</th>
          <th>The Must</th>
          <th>The Best</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach ($models as $index => $model): ?>
            <tr>
              <th scope="row">1</th>
              <th><?= $model->theMust; ?></th>
              <th><?= $model->theBest; ?></th>
              <td>
                  <?= $form->field($model, "[$index]value")->radio(['value'=>'9','uncheck'=>null])->label(false) ?>
              </td>
              <td>
                  <?= $form->field($model, "[$index]value")->radio(['value'=>'0','uncheck'=>null])->label(false) ?>
              </td>
              <td>
                <?= $form->field($model, "[$index]value")->radio(['value'=>'1','uncheck'=>null])->label(false) ?>
              </td>
              <td>
                <?= $form->field($model, "[$index]kpi_id")->hiddenInput()->label(false) ?>

                <?= $form->field($model, "[$index]value")->radio(['value'=>'2','uncheck'=>null])->label(false) ?>

                <?= $form->field($model, "[$index]year")->hiddenInput()->label(false) ?>
              </td>
            </tr>
          <?php endforeach; ?>
      </tbody>
    </table>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' =>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
