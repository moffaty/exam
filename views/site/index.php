<?php

/** @var yii\web\View $this */
$href = Yii::$app->user->isGuest ? "/site/login" : "/report/create";
$this->title = 'My Yii Application';
?>
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="/images/ne_logo.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy" style="">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">Нарушениям НЕТ!</h1>
        <p class="lead">Портал “Нарушением нет” является передовой платформой по приему заявок о дорожных правонарушениях. Сознательные граждане со всей России оставляют здесь свои заявления, когда не знают, куда обратиться. Каждая обращение граждан доходит до государственной инспекции безопасности дорожного движения (ГИБДД) и проверяется на соответствия всем нормам и правил дорожного движения.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <a href="/user/create" type="button" class="btn btn-primary btn-lg px-4 me-md-2">Регистрация</a>
          <a href=<?= $href ?> type="button" class="btn btn-outline-secondary btn-lg px-4">Авторизация</a>
        </div>
      </div>
    </div>
  </div>
<div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Наша работа</h1>
        <p class="col-md-8 fs-4">Мы отслеживаем, в каких районах чаще всего происходит правонарушения и передаем сведения в ГИБДД.</p>
        <a href=<?= $href ?> class="btn btn-primary btn-lg" type="button">Оставьте заявку</a>
      </div>
    </div>

    <div class="row align-items-md-stretch">
      <div class="col-md-6">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
          <h2>Наше призвание</h2>
          <p>Мы контролируем, чтобы каждое одобренное заявление было рассмотрено соответствующим органом.</p>
          <a href=<?= $href ?> class="btn btn-outline-light" type="button">Оставьте заявку</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-5 bg-light border rounded-3">
          <h2>Ваша безопасность</h2>
          <p>Мы следим за вашей безопасностью днем и ночью, давая ответ на заявки в течении пяти-десяти минут после ее формирования.</p>
          <a href=<?= $href ?> class="btn btn-outline-secondary" type="button">Оставьте заявку</a>
        </div>
      </div>
    </div>
</div>