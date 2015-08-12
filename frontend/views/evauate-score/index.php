<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\HospitalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'โรงพยาบาลที่ได้รับมอบหมาย';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-index">

  <?php if($dataProvider->getCount()==0): ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="jumbotron well ">
      <h3>คุณยังไม่ได้รับสิทธ์ในการประเมิน!</h3>
      <p>โปรดติดต่อผู้ดูแลระบบ...</p>
    </div>
  <?php endif; ?>
    <?php if($dataProvider->getCount()>0): ?>
      <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'hospital.code',
            'hospital.name',
            [
              'label'=>'Actoin',
              'format'=>'raw',
              'value'=>function($model){
                return Html::a('<i class="glyphicon glyphicon-share-alt"></i> ประเมิน',['evauate-score/create','hospital_id'=>$model->hospital_id],['class'=>'btn btn-default btn-block']);
              }
            ]
        ],
    ]); ?>
  <?php endif; ?>

</div>
