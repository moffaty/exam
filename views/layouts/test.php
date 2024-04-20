<header id="header" class="p-3 bg-dark text-white fixed-top">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/site/index" class="nav-link px-2 text-white">Главная</a></li>
          <li><a href="/site/about" class="nav-link px-2 text-white">О нас</a></li>
          <?= !Yii::$app->user->isGuest ? '<li><a href="/reports/index" class="nav-link px-2 text-white">Заявки</a></li>' : '' ?> 
        </ul>

        <div class="text-end">
        <?php 
            if (Yii::$app->user->isGuest) {
                echo '<a type="button" class="btn btn-outline-light me-2">Авторизация</a>';
                echo '<a type="button" class="btn btn-warning">Регистрация</a>';
            }
            else {
                echo '<form action="/site/logout" method="post">
                <input type="hidden" name="_csrf" value="14Ok1TXGVJ6gb2ZyHZ-xQC4M2ob6Uix9WWvfUyRCr8OG05S4AYA7-OgBDjl_x4htV2ecw5FiZiI0Dok2QXrHhA=="><button type="submit" class="nav-link btn btn-link logout">Выход (User User User)</button></form>';
            }
        ?>
          
        </div>
      </div>
    </div>
</header>