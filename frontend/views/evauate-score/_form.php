<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use common\models\Group;
$groups =  Group::find()->byHead()->all();
/* @var $this yii\web\View */
/* @var $model common\models\EvauateScore */
/* @var $form yii\widgets\ActiveForm */
?>
<ul class="nav nav-tabs nav-justified">
    <?php foreach ( $groups as $group): ?>
      <?= Html::beginTag('li',[
            'class'=>$group_id == $group->id?'active':null,
            'role'=>'presentation'
            ]); ?>
            <?= Html::a($group->name,[
              'evauate-score/create',
              'hospital_id'=>$hospital_id,
              'group_id'=>$group->id
            ]); ?>
      <?php Html::endTag('li'); ?>
    <?php endforeach; ?>
</ul>

<br>

<div class="evauate-score-form">

    <?php $form = ActiveForm::begin(); ?>
    <table class="radio-center table table-striped table-bordered">
      <thead>
        <tr >

          <th class="text-center">เกณฑ์ The Must</th>
          <th class="text-center">เกณฑ์ The Best</th>
          <th class="text-center" style="width:80px;">ไม่ประเมิน</th>
          <th class="text-center" style="width:80px;">ไม่ผ่าน</th>
          <th class="text-center" style="width:80px;">The Must</th>
          <th class="text-center" style="width:80px;">The Best</th>
        </tr>
      </thead>
      <tbody>
          <?php
          $group = null;
          foreach ($models as $index => $model): ?>

            <?php if($group!=$model->groupName): ?>
              <tr>
                <th colspan="7" style="line-height:35px;padding-left:25px;">
                  <?=$model->groupName?>
                </th>
              </tr>
              <tr>
            <?php endif; ?>

              <tr>

              <td style="padding-left:35px;">- <?= $model->theMust; ?></td>
              <td><?= $model->theBest; ?></td>
              <td>
                  <?php //$form->field($model, "[$index]value")->radio(['value'=>'9','uncheck'=>null])->label(false) ?>
                  <?= Html::activeRadio($model, "[$index]value",['value'=>'9','uncheck'=>null,'label'=>null]); ?>
              </td>
              <td>
                  <?php // $form->field($model, "[$index]value")->radio(['value'=>'0','uncheck'=>null])->label(false) ?>
                  <?= Html::activeRadio($model, "[$index]value",['value'=>'0','uncheck'=>null,'label'=>null]); ?>
              </td>
              <td>
                <?php // $form->field($model, "[$index]value")->radio(['value'=>'1','uncheck'=>null])->label(false) ?>
                <?= Html::activeRadio($model, "[$index]value",['value'=>'1','uncheck'=>null,'label'=>null]); ?>
              </td>
              <td>


                <?php //$form->field($model, "[$index]value")->radio(['value'=>'2','uncheck'=>null])->label(false) ?>
                <?= Html::activeRadio($model, "[$index]value",['value'=>'2','uncheck'=>null,'label'=>null]); ?>

              </td>
            </tr>
            <?php
              if($group==null){
                $group = $model->groupName;
              }
            ?>
            <?= $form->field($model, "[$index]year")->hiddenInput()->label(false) ?>
            <?= $form->field($model, "[$index]kpi_id")->hiddenInput()->label(false) ?>
          <?php endforeach; ?>
          <tr >

            <th colspan="4" class="text-center">ผลรวม</th>
            <th class="text-center" style="width:80px;"><?=$sumTheMust?></th>
            <th class="text-center" style="width:80px;"><?=$sumTheBest?></th>
          </tr>
      </tbody>
    </table>

    <div class="form-group">
        <?= Html::submitButton('บันทึกข้อมูล', ['class' =>'btn btn-success btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
