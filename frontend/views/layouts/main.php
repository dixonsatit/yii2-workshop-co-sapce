<?php
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Html;
 ?>
<?php $this->beginContent('@app/views/layouts/_base.php'); ?>
<div class="wrap">
<?= $this->render('_nav.php') ?>

    <div class="container">

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?= $this->render('_footer.php') ?>

<?php $this->endContent(); ?>
