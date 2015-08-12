<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EvauateScore */

$this->title = 'ระบบประเมินผล';
$this->params['breadcrumbs'][] = ['label' => 'สถานพยาบาลที่ได้รับมอบหมาย', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evauate-score-create">
  <div class="page-header" style="margin-bottom:60px;">
    <h1><?= Html::encode($this->title) ?> <small>คุณภาพโรงพยาบาล</small></h1>
  </div>

    <?= $this->render('_form', [
      'models' => $models,
      'hospital_id'=>$hospital_id,
      'group_id'=>$group_id,
      'sumTheMust' => $sumTheMust,
      'sumTheBest' => $sumTheBest
    ]) ?>

</div>
