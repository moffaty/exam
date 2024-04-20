<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'О нас', 'url' => ['/site/about']],
            Yii::$app->user->isGuest ? ['label' => 'Регистрация', 'url' => '/user/create'] : '',
            !Yii::$app->user->isGuest ? ['label' => 'Заявки', 'url' => '/report/index'] : '',
            Yii::$app->user->isGuest
                ? ['label' => 'Авторизация', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Выход (' . Yii::$app->user->identity->fio . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="mt-auto py-3 bg-light">
<ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="/site/index" class="nav-link px-2 text-muted">Главная</a></li>
      <li class="nav-item"><a href="/site/about" class="nav-link px-2 text-muted">О нас</a></li>
      <?php 
        if (Yii::$app->user->isGuest) {
            echo '<li class="nav-item"><a href="/site/login" class="nav-link px-2 text-muted">Авторизация</a></li>';
        }
        else {
            echo '<li class="nav-item"><a href="/report/index" class="nav-link px-2 text-muted">Заявки</a></li>';
        }
      ?>
    </ul>
    <p class="text-center text-muted">Портал &copy; <?= Yii::$app->name ?> <?= date('Y') ?></p>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
