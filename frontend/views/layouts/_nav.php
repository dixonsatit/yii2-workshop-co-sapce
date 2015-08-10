<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
?>


<?php
NavBar::begin([
    'brandLabel' => 'Yii 2 Leanning',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
    ['label' => 'About', 'url' => ['/site/about']],
    ['label' => 'Contact', 'url' => ['/site/contact']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = ['label' => 'ประเมิน', 'url' => ['/evauate-score/index']];
    $menuItems[] = [
        'label' => 'Profile (' . Yii::$app->user->identity->username . ')',
        'items'=>[
            ['label' => 'โปรไฟล์', 'url' => ['/profile/index']],
            ['label' => 'แข้ไขโปรไฟล์', 'url' => ['/profile/update']],
            [ 'label'=>'Logout','url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']]
        ]
    ];
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();
?>
