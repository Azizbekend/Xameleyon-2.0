<?php
$publicPath = '../../public/';

function getTheory($theoryList, $idTheory)
{
    $result = '';

    if (isset($theoryList[0]['grade'])) {
        foreach ($theoryList as $theory) {
            if ($idTheory == $theory['theory']['id']) {
                $result = $theory['theory'];
            }
        }
    } else {
        foreach ($theoryList as $theory) {
            if ($idTheory == $theory['id']) {
                $result = $theory;
            }
        }
    }

    return $result;
}

$coursName = $vars["coursName"];
$theoryList = $vars["theoryList"];

// Выводим первую теорию, когда заходим на страницу урока.
if (!isset($_GET['idTheory'])) {
    if ($_SESSION['user']['idRole'] == 3) {
        $_GET['idTheory'] = $theoryList[0]['theory']['id'];
    } else if (isset($_GET['idTheory'])) {
        $_GET['idTheory'] = $theoryList[0]['id'];
    }
}
?>

<div class="lesson _content _py">
    <div class="lesson-panel__open">
        <img class="" src="<?= htmlentities($publicPath) ?>media/icons/arrow-square-right.png" alt="arrow-square-right">
    </div>

    <div class="lesson-panel">
        <div class="lesson-panel__content">
            <div class="lesson-card _fonBack-navy__blue _hover">
                <p><?= $coursName ?></p>
                <div class="lesson-panel__close">
                    <img src="<?= htmlentities($publicPath) ?>media/icons/arrow-square-right.png"
                        alt="arrow-square-right">
                </div>
            </div>

            <!-- Вывод панели с уроками -->
            <?php if (isset($theoryList[0]['grade'])) {
                foreach ($theoryList as $theory) {
                    $theoryInfo = $theory['theory'];
                    ?>
                    <a class="lesson-card _fonBack-navy__blue _hover" href="?idTheory=<?= htmlentities($theoryInfo['id']) ?>">
                        <p><?= htmlentities($theoryInfo['name']) ?></p>

                        <?php if ($theory['grade'] == 1) { ?>
                            <img src="<?= htmlentities($publicPath) ?>media/icons/tick-square.png" alt="tick-square">
                        <?php } ?>

                    </a>
                <?php }
            } else {
                foreach ($theoryList as $theory) { ?>
                    <a class="lesson-card _fonBack-navy__blue _hover" href="?idTheory=<?= htmlentities($theory['id']) ?>">
                        <p><?= htmlentities($theory['name']) ?></p>

                        <form method="post">
                            <input type="hidden" name="idheory" value="<?= $theory['id'] ?>">
                            <button class="lesson-card__btnRemove" name="removeTheory">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.89844 2.19287L23.0009 22.8069" stroke="white" stroke-width="3"
                                        stroke-linecap="round" />
                                    <path d="M1.89844 22.8066L23.0009 2.19264" stroke="white" stroke-width="3"
                                        stroke-linecap="round" />
                                </svg>
                            </button>
                        </form>
                    </a>
                <?php }
            } ?>

            <?php if ($_SESSION['user']['idRole'] == 2) { ?>
                <a class="lesson-card _fonBack-navy__blue _hover" href="?idTheory=add">
                    <p>Добавить урок</p>
                </a>
            <?php } ?>

            <a class="lesson-card __telegram _fonBack-navy__blue _hover" href="https://t.me/AZIZ_006">
                <p>Телеграмм канал</p>
            </a>
        </div>
    </div>

    <?php

    $theory = [
        "typeMedia" => "img",
        "img" => "",
        "name" => "",
        "text" => "",
        "idLesson" => "",
    ];

    if (isset($_GET["idTheory"]) && $_GET["idTheory"] != "add") {
        $theoryInfo = getTheory($theoryList, $_GET["idTheory"]);
        if (!empty($theoryInfo)) {
            $theory = [
                "typeMedia" => $theoryInfo['mediaType'],
                "img" => $theoryInfo['media'],
                "name" => $theoryInfo['name'],
                "text" => $theoryInfo['text'],
                "idLesson" => $theoryInfo['id'],
            ];
        }
    }
    ?>

    <?php if ($_SESSION['user']["idRole"] == 2) { ?>
        <form class="lesson-windows _fonBack-navy__blue" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idLesson" style="display: none;" value="<?= htmlentities($theory["idLesson"]) ?>">
            <input type="file" name="imgLesson" id="imgLesson" style="display: none;">

            <div class="lesson-windows__video" id="theory-media">
                <?php if ($theory["typeMedia"] == "img") { ?>

                    <?php if (!empty($theory['img'])) { ?>
                        <input type="text" name="imgNameLesson" style="display: none;" value="<?= htmlentities($theory["img"]) ?>">

                        <img src="<?= htmlentities($publicPath) ?>media/lessons/<?= htmlentities($theory["img"]) ?>"
                            alt="tick-square">
                    <?php } ?>

                <?php } else { ?>
                    <video controls>
                        <source src="<?= htmlentities($publicPath) ?>media/lessons/<?= htmlentities($theory["img"]) ?>"
                            type="video/mp4">
                    </video>
                <?php } ?>
            </div>

            <label for="imgLesson"
                class="lesson-windows__btn _btn _notBack"><?= $theory['img'] != 'defult.jpg' ? "Изменить медиа" : "Добавить медиа" ?></label>

            <div class="lesson-errors">
                <?php // Вывод ошибок
                    if (isset($_SESSION['errors']['theoryImg'])) { ?>
                    <p style="color: red"><?= $_SESSION['errors']['theoryImg']; ?></p>
                    <?php unset($_SESSION['errors']['theoryImg']);
                    } ?>
            </div>

            <div class="lesson-windows__name">
                <input type="text" name="theoryName" value="<?= htmlentities($theory["name"]) ?>" placeholder="Название">
            </div>

            <div class="lesson-errors">
                <?php // Вывод ошибок
                    if (isset($_SESSION['errors']['theoryName'])) { ?>
                    <p style="color: red"><?= $_SESSION['errors']['theoryName']; ?></p>
                    <?php unset($_SESSION['errors']['theoryName']);
                    } ?>
            </div>

            <div class="lesson-windows__description">
                <textarea name="textLesson" placeholder="Теория"><?= htmlentities($theory["text"]) ?></textarea>
            </div>

            <div class="lesson-errors">
                <?php // Вывод ошибок
                    if (isset($_SESSION['errors']['textLesson'])) { ?>
                    <p style="color: red"><?= $_SESSION['errors']['textLesson']; ?></p>
                    <?php unset($_SESSION['errors']['textLesson']);
                    } ?>
            </div>

            <?php if (isset($_GET['idTheory']) && $_GET['idTheory'] != "add") { ?>
                <input type="hidden" name="idTheory" value="<?= htmlentities($_GET['idTheory']) ?>">
                <button class="lesson-windows__btn _btn" name="updateLesson">Обновить урок</button>
            <?php } else { ?>
                <button class="lesson-windows__btn _btn" name="addLesson">Добавить урок</button>
            <?php } ?>
        </form>

    <?php } else { ?>
        <form class="lesson-windows _fonBack-navy__blue" method="post">
            <div class="lesson-windows__video">

                <?php if ($theory["typeMedia"] == "img") { ?>
                    <img src="<?= htmlentities($publicPath) ?>media/lessons/<?= htmlentities($theory["img"]) ?>"
                        alt="tick-square">
                <?php } else { ?>
                    <video controls>
                        <source src="<?= htmlentities($publicPath) ?>media/lessons/<?= htmlentities($theory["img"]) ?>"
                            type="video/mp4">
                    </video>
                <?php } ?>

            </div>
            <div class="lesson-windows__name">
                <p><?= htmlentities($theory["name"]) ?></p>
            </div>
            <div class="lesson-windows__description">
                <pre><?= htmlentities($theory["text"]) ?></pre>
            </div>
            <input type="hidden" name="idTheory" value="<?= htmlentities($_GET['idTheory']) ?>">
            <button class="lesson-windows__btn _btn" name="nextLesson">Следующий урок</button>
        </form>
    <?php } ?>
</div>