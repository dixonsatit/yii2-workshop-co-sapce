<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use common\models\BudgetYear;
/* @var $this yii\web\View */
/* @var $model common\models\BudgetYear */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="budget-year-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'year')->dropdownList(ArrayHelper::map(BudgetYear::find()->all(),'id','year')) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'start_date')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter birth date ...'],
    'pluginOptions' => [
        'autoclose'=>true
    ]
]); ?>

<?= $form->field($model, 'end_date')->widget(DatePicker::classname(), [
'options' => ['placeholder' => 'Enter birth date ...'],
'pluginOptions' => [
    'autoclose'=>true
]
]); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
