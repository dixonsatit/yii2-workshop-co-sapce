<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EvauateScore */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Evauate Score',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Evauate Scores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="evauate-score-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'group'=>$group
    ]) ?>

</div>
