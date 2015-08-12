<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            'email:email',
            [
              'label'=>'Active',
              'format'=>'html',
              'value'=>function($model){
                  return Html::a(
                  ($model->status==0?'<i class="glyphicon glyphicon-remove"></i> Not Active':'<i class="glyphicon glyphicon-ok"></i> Active'),'#',
                  ['class'=>'btn btn-block btn-sm'.($model->status==0?' btn-default':' btn-success')]);
              }
            ],
            [
              'attribute'=>'levelName',
              'format'=>'html',
              'value'=>function($model){
                return '<a class="btn btn-default btn-block">'.$model->levelName.'</a>';
              }
            ],
            // 'status',
            // 'created_at',
            // 'updated_at',

            [
              'class' => 'yii\grid\ActionColumn',
              'options'=>['style'=>'width:120px;'],
              'buttonOptions'=>['class'=>'btn btn-default'],
              'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
           ],
        ],
    ]); ?>

</div>
