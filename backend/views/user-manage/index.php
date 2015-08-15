<?php

use yii\helpers\Html;
use yii\grid\GridView;
//use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>



      <?php yii\widgets\Pjax::begin(['id' => 'grid-user-pjax','timeout'=>5000]) ?>

        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
<br>


              <?= GridView::widget([
                  'id'=>'grid-user',
                  'dataProvider' => $dataProvider,
                  'filterModel' => $searchModel,
                  //'pjax'=>true,
                  'tableOptions' => [
                    'class' => 'table table-bordered  table-striped table-hover',
                  ],
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
                        'attribute'=>'status',
                        'filter'=>$searchModel->getItemStatus(),
                        'format'=>'html',
                        'value'=>function($model){
                            return $model->status==0?'<i class="glyphicon glyphicon-remove"></i> <span class="text-danger">Not Active</span>':'<i class="glyphicon glyphicon-ok"></i> <span class="text-success">Active</span>';
                        }
                      ],
                      [
                        'attribute'=>'level',
                        'filter'=>$searchModel->getItemLevel(),
                        'format'=>'html',
                        'value'=>function($model){
                          return $model->levelName;
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

    <?php yii\widgets\Pjax::end() ?>



<?php
$this->registerJs('
  $("#pjax-search-form").on("pjax:end", function() {
    $.pjax.reload({container:"#grid-user-pjax"});
  });

  $("#grid-user-pjax")
  .on("pjax:start", function() { console.log("start") })
  .on("pjax:end",   function() { console.log("stop") });
');
?>
