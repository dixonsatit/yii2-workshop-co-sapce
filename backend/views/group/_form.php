<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Group;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $model common\models\Group */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'parent_id')->dropdownList(ArrayHelper::merge([null=>'None'],Group::getHierarchy())) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
