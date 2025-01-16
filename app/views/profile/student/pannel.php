
<a class="office__panel-tab <?php if ($pannelActive == "infoUser") {
    echo '_active';
} ?> _none" href="infoUser">
    <span>Личная информация</span>
    <div class="office__tab-img">
        <img src="<?= htmlentities($publicPath) ?>media/icons/user.svg" alt="user">
    </div>
</a>

<a class="office__panel-tab <?php if ($pannelActive == "coursesMy") {
    echo '_active';
} ?>" href="coursesMy">
    <span>Мои курсы</span>
    <div class="office__tab-img">
        <img src="<?= htmlentities($publicPath) ?>media/icons/mycourse.svg" alt="user">
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

<a class="office__panel-tab _none" href="exit">
    <span>Выйти</span>
    <div class="office__tab-img">
        <img src="<?= $publicPath ?>media/icons/logout.svg" alt="logout">
    </div>
</a>