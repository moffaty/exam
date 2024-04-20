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
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/images/logo.png']);
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

<header id="header" class="p-2 bg-dark bg-gradient text-white fixed-top">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img src="/images/header-icon.png" style="border-radius: 50%" class="bi me-2" width="80" height="60" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/site/index" class="nav-link px-2 text-white">Главная</a></li>
          <li><a href="/site/about" class="nav-link px-2 text-white">О нас</a></li>
          <?= !Yii::$app->user->isGuest ? '<li><a href="/report/index" class="nav-link px-2 text-white">Заявки</a></li>' : '' ?> 
        </ul>

        <div class="text-end">
        <?php 
            if (Yii::$app->user->isGuest) {
                echo '<a type="button" href="/site/login" class="btn btn-outline-light me-2">Авторизация</a>';
                echo '<a type="button" href="/user/create" class="btn btn-warning">Регистрация</a>';
            }
            else {
                echo '<form action="/site/logout" method="post">
                <input type="hidden" name="_csrf" value="14Ok1TXGVJ6gb2ZyHZ-xQC4M2ob6Uix9WWvfUyRCr8OG05S4AYA7-OgBDjl_x4htV2ecw5FiZiI0Dok2QXrHhA==">
                <button type="submit" class="btn btn-outline-light me-2 logout">Выход (' . Yii::$app->user->identity->fio .')</button></form>';
            }
        ?>
          
        </div>
      </div>
    </div>
</header>
<main id="main" class="flex-shrink-0 mt-3" role="main">
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
