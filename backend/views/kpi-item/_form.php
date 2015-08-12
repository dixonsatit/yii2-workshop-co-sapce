<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Group;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\KpiItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpi-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'the_must')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'the_best')->textarea(['rows' => 6]) ?>

  <?php //$form->field($model, 'group_id')->dropdownList(Group::getHierarchy()) ?>
    <?= $form->field($model, 'group_id')->widget(Select2::classname(), [
        //'data' => ArrayHelper::map(Group::find()->all(),'id','name'),
        'data' =>Group::getHierarchy(),
        'options' => ['placeholder' => 'เลือกหัวข้อ ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
