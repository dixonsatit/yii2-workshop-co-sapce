<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BudgetYear */

$this->title = Yii::t('app', 'Create Budget Year');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Budget Years'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="budget-year-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
