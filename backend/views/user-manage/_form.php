<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="well">
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <div class="row">
      <div class="col-lg-6">
          <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
      </div>
      <div class="col-lg-6">
        <?= $form->field($model, 'confirm_password')->passwordInput(['maxlength' => true]) ?>
      </div>
    </div>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
</div>
<div class="well">
    <div class="row">
      <div class="col-lg-4">
        <?= $form->field($model, 'role')->checkBoxList($model->getItemRole()) ?>
      </div>
      <div class="col-lg-4">
        <?= $form->field($model, 'level')->radioList($model->getItemLevel()) ?>
      </div>
      <div class="col-lg-4">
        <?= $form->field($model, 'status')->radioList($model->getItemStatus()) ?>
      </div>
    </div>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
