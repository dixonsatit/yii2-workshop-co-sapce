<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EvauateScore */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evauate-score-form">

    <?php $form = ActiveForm::begin(); ?>

<?php

foreach ($kpiItem as $item) {
    echo $form->field($setting, "[$index]value")->label($setting->name);
}
 ?>
    <?= $form->field($model, 'kpi_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'value')->textInput() ?>

    <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
