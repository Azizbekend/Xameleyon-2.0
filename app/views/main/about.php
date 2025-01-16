
<?php $publicPath = '../public/';  ?>

<div class="wrapper">
    <!-- banner -->
    <section class="banner">
        <div class="banner__word _content _py">
            <p class="_text-lvl_1">Хамелеон</p>
            <h1>Онлайн школа программирования</h1>
            <a class="banner__btn _btn" href="../main/#cours">Начать обучение</a>
            <a class="banner__errow" href="#about">
                <span>V</span>
                <span>V</span>
                <span>V</span>
            </a>
        </div>
        <div class="banner__ellips">
            <div class="banner__ellip"></div>
            <div class="banner__ellip"></div>
        </div>
    </section>

    <section class="_lineSection _content _py"></section>

    <!-- about -->
    <section class="about _py _content" id="about">
        <div class="info-block _fonBack-navy__blue">
            <div class="info-block__word">
                <h3 class="_700"><span>Хамелеон</span> - это ...</h3>
                <p class="_text-lvl_1"> команда профессиональных разработчиков и преподавателей, цель которых помочь вам освоить мир программирования легко и с удовольствием. Наши курсы разработаны с учетом актуальных трендов в IT индустрии, чтобы вы могли приобрести практические навыки, необходимые для успешного старта в карьере разработчика.</p>
            </div>
            <img class="info-block__logo" src="<?=$publicPath?>/media/logo/logo-mini.svg" alt="logo-mini">
            <img class="info-block__pretzel" src="<?=$publicPath?>/media/icons/rainbow-pretzel.png" alt="rainbow-pretzel">
        </div>
    </section>

    <section class="_lineSection _content _py"></section>

    <!-- numbers -->
    <section class="numbers _content _py">
        <h2 class="numbers__title _700"><span>Хамелеон</span> в цифрах</h2>
        <div class="numbers__cards">
            <div class="numbers__card _fonBack-navy__blue _hover">
                <p class="numbers__num">10+</p>
                <p class="numbers__text _text-lvl_1">Количество наших наставников</p>
            </div>
            <div class="numbers__card _fonBack-navy__blue _hover">
                <p class="numbers__num">8+</p>
                <p class="numbers__text _text-lvl_1">Количество всех наших курсов</p>
            </div>
            <div class="numbers__card _fonBack-navy__blue _hover">
                <p class="numbers__num">1000+</p>
                <p class="numbers__text _text-lvl_1">Общее количество наших студентов</p>
            </div>
        </div>
    </section>

    <section class="_lineSection _content _py"></section>

    <!-- documents -->
    <section class="documents _content _py">
        <h2 class="documents__title _700">ГОСУДАРСТВЕННЫЙ <span>СЕРТИФИКАТ</span></h2>
        <div class="documents__bottom">
            <div class="documents__words">
                <p class="_text-lvl_1">Учебная деятельность в Хамелеон осуществляется на основании государственной лицензии № 0332 от 1 апреля 2024 года</p>
                <a class="_text-lvl_1" href="<?=$publicPath?>/documents/oferta.docx" download><img src="<?=$publicPath?>/media/icons/document-text.svg" alt="document-text">Скачать публичную оферту</a>
                <a class="_text-lvl_1" href="<?=$publicPath?>/documents/oferta.docx" download><img src="<?=$publicPath?>/media/icons/document-text.svg" alt="document-text">Скачать политику конфиденциальности</a>
            </div>
            <div class="documents__imgs">
                <img class="documents__img" src="<?=$publicPath?>/media/page-about/about-сertificate-1.jpg" alt="about-сertificate">
                <img class="documents__img" src="<?=$publicPath?>/media/page-about/about-сertificate-2.jpg" alt="about-сertificate">
            </div>
        </div>
    </section>
</div>