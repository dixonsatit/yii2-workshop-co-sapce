<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EvauateScore */

$this->title = Yii::t('app', 'Create Evauate Score');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Evauate Scores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evauate-score-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
