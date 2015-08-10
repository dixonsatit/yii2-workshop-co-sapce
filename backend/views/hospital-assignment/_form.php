<?php
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
use common\models\Hospital;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\HospitalAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hospital-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(User::find()->all(),'id','username'),
        'options' => ['placeholder' => 'เลือกผู้ใช้งาน ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'hospital_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Hospital::find()->all(),'id','name'),
        'options' => ['placeholder' => 'เลือกผู้ใช้งาน ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
