<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\KpiItem */

$this->title = Yii::t('app', 'Create Kpi Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kpi Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
