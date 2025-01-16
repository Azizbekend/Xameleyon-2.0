<?php
$publicPath = '../public/';

$courses = $vars['courses'];
$profUseres = $vars['profUseres'];
?>

<div class="wrapper">
    <!-- banner -->
    <section class="welcome-banner _content _py">
        <div class="welcome-banner__word">
            <p class="_text-lvl_1">Платформа онлайн обучения</p>
            <h2>Вход в it начинается здесь</h2>
            <a class="_btn" href="#cours">Начать обучение</a>
        </div>
        <div class="welcome-banner__foto">
            <span class="welcome-banner__ellipse _first "></span>
            <div class="welcome-banner__obsalute">
                <img src="<?= htmlentities($publicPath) ?>media/page-welcome/welcome-banne.png" alt="banner">
                <span class="welcome-banner__ellipse _second"></span>
            </div>
        </div>
    </section>

    <section class="_lineSection _content _py"></section>

    <!-- about -->
    <section class="about _py _content" id="about">
        <div class="info-block _fonBack-navy__blue">
            <div class="info-block__word">
                <h3 class="_700"><span>Хамелеон</span> - это ...</h3>
                <p class="_text-lvl_1"> команда профессиональных разработчиков и преподавателей, цель которых помочь вам
                    освоить мир программирования легко и с удовольствием. Наши курсы разработаны с учетом актуальных
                    трендов в IT индустрии, чтобы вы могли приобрести практические навыки, необходимые для успешного
                    старта в карьере разработчика.</p>
            </div>
            <img class="info-block__logo" src="<?= htmlentities($publicPath) ?>media/logo/logo-mini.svg"
                alt="logo-mini">
            <img class="info-block__pretzel" src="<?= htmlentities($publicPath) ?>media/icons/rainbow-pretzel.png"
                alt="rainbow-pretzel">
        </div>
        <a class="about__btn _btn _border" href="about">Познакомиться →</a>
    </section>

    <section class="_lineSection _content _py"></section>

    <!-- cours -->
    <section class="cours _content _py" id="cours">
        <h2 class="cours__title _700">Курсы</h2>
        <div class="cours__cards">

            <?php foreach ($courses as $course) { ?>

                <div class="cours__card _cours-card">
                    <img src="<?= htmlentities($publicPath) ?>media/cours-cards/<?= htmlentities($course['img']) ?>"
                        alt="cours">
                    <h5><?= htmlentities($course['name']) ?></h5>
                    <p class="_text-lvl_2"><?= htmlentities($course['miniDiscription']) ?></p>

                    <?php
                    if ($course['releaseCourse'] == 1) { ?>
                        <form method="post" action="cours">
                            <input type="hidden" name="id" value="<?= htmlentities($course['id']) ?>">
                            <button name="oneCourse">Подробнее <span>→</span></button>
                        </form>
                    <?php } else { ?>
                        <h5>СКОРО</h5>
                    <?php } ?>
                </div>

            <?php } ?>
        </div>
    </section>

    <section class="_lineSection _content _py"></section>

    <!-- process -->
    <section class="process _content _py">
        <h2 class="process__title _700">Процесс <span>обучения</span></h2>
        <div class="process__cards">
            <div class="process__card _first _fonBack-navy__blue _hover">
                <div class="process__name">
                    <img src="<?= htmlentities($publicPath) ?>media/page-welcome/process-1.png" alt="process">
                    <h5>Обучение под вас</h5>
                </div>
                <p class="_text-lvl_3">Более 3 курсов IT-специальностей, где методы обучения адаптированы под ваши
                    потребности.</p>
            </div>
            <div class="process__card _second _fonBack-navy__blue _hover">
                <div class="process__name">
                    <img src="<?= htmlentities($publicPath) ?>media/page-welcome/process-2.png" alt="process">
                    <h5>Учителя-эксперты</h5>
                </div>
                <p class="_text-lvl_3">Эксперты Хамелеон уже обучили более 50.000 учеников по Узбекистану, пройдя
                    теорию и практику.</p>
            </div>
            <div class="process__card _third _fonBack-navy__blue _hover">
                <div class="process__name">
                    <img src="<?= htmlentities($publicPath) ?>media/page-welcome/process-3.png" alt="process">
                    <h5>IT-сообщество</h5>
                </div>
                <p class="_text-lvl_3">Сотрудничество, обмен знаниями и реальные проекты. Хамелеон это больше, чем
                    просто платформа -
                    это ваше IT сообщество.</p>
            </div>
        </div>
    </section>

    <section class="_lineSection _content _py"></section>

    <!-- teacher -->
    <section class="teacher _py" id="teacher">
        <h2 class="teacher__title _700"><span>Ваши</span> наставники</h2>
        <div class="teacher__cards">
            <?php foreach ($profUseres as $profUser) { ?>
                <div class="teacher__card teacher-card _fonBack-navy__blue">
                    <div class="teacher-card__img">
                        <img src="<?= htmlentities($publicPath) ?>/media/users/<?= htmlentities($profUser['img']) ?>"
                            alt="teacher">
                    </div>
                    <h4 class="_700"><?= htmlentities($profUser['surname']) ?>     <?= htmlentities($profUser['name']) ?>
                    </h4>
                    <p class="_text-lvl_1">
                        <?= htmlentities($profUser['nameProf']); ?>
                    </p>
                    <img class="teacher-card__work"
                        src="<?= $publicPath ?>/media/teachers/<?= htmlentities($profUser['imgProf']); ?>"
                        alt="teacher-1_work">
                </div>
            <?php } ?>
        </div>
    </section>
</div>

<?php
if ($_SERVER['REQUEST_URI'] == "/") {
    echo "<script>document.location.href='/main/'</script>";
}
?>