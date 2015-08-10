<?php
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
 ?>
<?php $this->beginContent('@app/views/layouts/_base.php'); ?>
<div class="wrap">
<h1>Dixon <small> @khon kaen</small></h1>

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
