<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Контактные данные';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="/images/0.jpg" alt="" width="172" height="157" style="border-radius: 40%">
    <h1 class="display-5 fw-bold"><?= Html::encode($this->title) ?></h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Мы отслеживаем, в каких районах чаще всего происходит правонарушения и передаем сведения в ГИБДД.</p>
      <p class="lead mb-4">Связаться с нами вы можете по телефону: +7 (999) 888 33-22</p>
      <p class="lead mb-4">Или по электронной почте: support@narusheniyam.net</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
      </div>
    </div>
</div>
</div>
