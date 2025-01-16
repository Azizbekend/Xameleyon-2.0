<a class="office__panel-tab <?php if ($pannelActive == "infoUser") {
    echo '_active';
} ?>" href="infoUser">
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
        <img src="<?= htmlentities($publicPath) ?>media/icons/teacher.svg" alt="teacher">
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