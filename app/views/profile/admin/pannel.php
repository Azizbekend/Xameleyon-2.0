<a class="office__panel-tab <?php if ($pannelActive == "infoUser") {
    echo '_active';
} ?> _none" href="infoUser">
    <span>Личная информация</span>
    <div class="office__tab-img">
        <img src="<?= htmlentities($publicPath) ?>media/icons/user.svg" alt="user">
    </div>
</a>

<a class="office__panel-tab <?php if ($pannelActive == "courses") {
    echo '_active';
} ?>" href="courses">
    <span>Курсы</span>
    <div class="office__tab-img">
        <img src="<?= htmlentities($publicPath) ?>media/icons/teacher.svg" alt="user">
    </div>
</a>

<a class="office__panel-tab <?php if ($pannelActive == "statistics") {
    echo '_active';
} ?>" href="statistics">
    <span>Статистика</span>
    <div class="office__tab-img">
        <img src="<?= htmlentities($publicPath) ?>media/icons/diagram.svg" alt="user">
    </div>
</a>

<a class="office__panel-tab <?php if ($pannelActive == "addcours") {
    echo '_active';
} ?>" href="addcours">
    <span>Добавить курс</span>
    <div class="office__tab-img">
        <img src="<?= htmlentities($publicPath) ?>media/icons/add-cours.svg" alt="user">
    </div>
</a>

<a class="office__panel-tab <?php if ($pannelActive == "exit") {
    echo '_active';
} ?> _none" href="exit">
    <span>Выйти</span>
    <div class="office__tab-img">
        <img src="<?= htmlentities($publicPath) ?>media/icons/logout.svg" alt="logout">
    </div>
</a>