<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\HospitalAssignment */

$this->title = Yii::t('app', 'Create Hospital Assignment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hospital Assignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-assignment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
