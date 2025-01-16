<?php
$publicPath = '../public/';

$user = $_SESSION['user'];

switch ($user['idRole']) {
    case '1':
        $panelTitle = "Админ";
        $panel = 'app/views/profile/admin/pannel.php';
        break;

    case '2':
        $panelTitle = "Учитель";
        $panel = 'app/views/profile/teacher/pannel.php';
        break;

    case '3':
        $panelTitle = "Ученик";
        $panel = 'app/views/profile/student/pannel.php';
        break;

    default:
        // Страница с ошибкой
        break;
}
?>

<div class="office _py">

    <div class="office__panel op _fonBack-navy__blue">
        <div class="office__panel-content">
            <div class="office__panel-scroll">
                <!-- Выводим заголовок по роли -->
                <h3 class="_700"><?= $panelTitle ?>
                </h3>
                <div class="office__panel-user office__user">
                    <?php if (empty($user['img'])) { ?>
                        <img src="<?= htmlentities($publicPath) ?>media/users/defult.jpg" alt="user">
                    <?php } else { ?>
                        <img src="<?= htmlentities($publicPath) ?>media/users/<?= htmlentities($user['img']) ?>" alt="user">
                    <?php } ?>
                    <p class="_text-lvl_2 _700"><?= htmlentities($user['surname']) ?> <?= htmlentities($user['name']) ?>
                    </p>
                </div>

                <!-- Подключение панели по ролям -->

                <?php
                if ($user['ban'] != 1) {
                    require $panel;
                } else { ?>
                    <a class="office__panel-tab <?php if ($pannelActive == "exit") {
                        echo '_active';
                    } ?> _none" href="exit">
                        <span>Выйти</span>
                        <div class="office__tab-img">
                            <img src="<?= htmlentities($publicPath) ?>media/icons/logout.svg" alt="logout">
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="office__header _fonBack-navy__blue">
        <a class="office__user" href="infoUser">
            <?php if (empty($user['img'])) { ?>
                <img src="<?= htmlentities($publicPath) ?>media/users/defult.jpg" alt="user">
            <?php } else { ?>
                <img src="<?= htmlentities($publicPath) ?>media/users/<?= htmlentities($user['img']) ?>" alt="user">
            <?php } ?>
            <p class="_text-lvl_2 _700"><?= htmlentities($user['surname']) ?> <?= htmlentities($user['name']) ?></p>
        </a>

        <div class="office__header-btns">
            <a class="office__header-tab" href="exit">
                <div class="office__tab-img"><img src="<?= htmlentities($publicPath) ?>media/icons/logout.svg"
                        alt="logout"></div>
            </a>
        </div>
    </div>

    <div class="office__windows">
        <?php
        if ($user['ban'] != 1) {
            switch ($panelWin) {
                case 'addcours':
                    include "windows/addcours.php";
                    break;
                case 'courses':
                    include "windows/courses.php";
                    break;
                case 'coursesMy':
                    include "windows/studentsCurs.php";
                    break;
                case 'group':
                    include "windows/group.php";
                    break;
                case 'groupInfo':
                    include "windows/groupInfo.php";
                    break;
                case 'statistics':
                    include "windows/statistics.php";
                    break;
                case 'studentsCurs':
                    include "windows/studentsCurs.php";
                    break;
                case 'userInfo':
                    include "windows/userInfo.php";
                    break;
                case 'userInfoForAdmin':
                    include "windows/userInfoForAdmin.php";
                    break;
                case 'infoCourse':
                    include "windows/infoCourse.php";
                    break;
                case 'buy':
                    include "windows/buy.php";
                    break;

                default:
                    include "windows/userInfo.php";
                    break;
            }
        } else {
            include "windows/ban.php";
        }
        ?>
    </div>
</div>