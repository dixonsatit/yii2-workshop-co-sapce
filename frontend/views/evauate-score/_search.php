<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EvauateScoreSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evauate-score-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kpi_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'value') ?>

    <?= $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'hospitall_code') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
