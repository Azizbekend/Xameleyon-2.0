<!-- footer -->
<footer class="footer _content 
<?php
if ($headFoot == "profile")
    echo "_padding";
?>
">
    <div class="footer__content">
        <div class="footer__left">
            <a class="footer__logo" href="/">
                <img src="<?= htmlentities($publicPath) ?>media/logo/logo-mini.svg" alt="logo-mini">
                <p>Xameleyon</p>
            </a>
            <p class="footer__copirate">Все права зищищены ©Мамадалиев, 2024</p>
        </div>
        <div class="footer__navigate">
            <p class="footer__name">МЕНЮ</p>
            <a href="<?= htmlentities($links['about']) ?>">О нас</a>
            <a href="<?= htmlentities($links['cours']) ?>">Курсы</a>
            <a href="<?= htmlentities($links['teacher']) ?>">Наставники</a>
            <a href="<?= htmlentities($links['contact']) ?>">Контакты</a>
        </div>
        <div class="footer__navigate">
            <p class="footer__name">КОНТАКТЫ</p>
            <a href="tel:+79658426587">+79658426587</a>
            <a href="https://yandex.uz/maps/-/CDRfUB2F">Ташкент, уличца Муминова, 4A</a>
            <div class="footer__media">
                <a href="https://t.me/AZIZ_006">
                    <img src="<?= htmlentities($publicPath) ?>media/icons/telegram-white.png" alt="telegram-white">
                </a>
                <a href="https://web.whatsapp.com/">
                    <img src="<?= htmlentities($publicPath) ?>media/icons/whatsapp-white.png" alt="whatsapp-white">
                </a>
                <a href="https://www.youtube.com/">
                    <img src="<?= htmlentities($publicPath) ?>media/icons/youtube-white.png" alt="youtube-white">
                </a>
            </div>
        </div>
    </div>
</footer>



<?php
if ($pannelActive == "about" || $pannelActive == "cours" || $pannelActive == "login" || $pannelActive == "register" || $pannelActive == "welcome") {
    echo '<script src=" ' . $publicPath . 'js/switchMenu.js"></script>';
    echo '<script src=" ' . $publicPath . 'js/switchLang.js"></script>';
    echo '<script src=" ' . $publicPath . 'js/telephone.js"></script>';
    echo '<script src=" ' . $publicPath . 'js/yatranslate.js"></script>';
} else if ($pannelActive == "statistics") {
    echo '<script src=" ' . $publicPath . 'js/select.js"></script>';
    echo '<script src=" ' . $publicPath . 'js/profileStatistic.js"></script>';
} else if ($pannelActive == 'infoUser') {
    echo '<script src=" ' . $publicPath . 'js/telephone.js"></script>';
    echo '<script src=" ' . $publicPath . 'js/fotoUser.js"></script>';
} else if ($pannelActive == "lesson") {
    echo '<script src=" ' . $publicPath . 'js/lesson.js"></script>';
    echo '<script src=" ' . $publicPath . 'js/switchLang.js"></script>';
    echo '<script src=" ' . $publicPath . 'js/yatranslate.js"></script>';
} else if ($pannelActive == "buy") {
    echo '<script src=" ' . $publicPath . 'js/buy.js"></script>';
} else if ($pannelActive == "lesson") {
    echo '<script src=" ' . $publicPath . 'js/switchLang.js"></script>';
    echo '<script src=" ' . $publicPath . 'js/yatranslate.js"></script>';
}
?>
</body>

</html>