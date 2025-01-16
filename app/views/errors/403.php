<?php $publicPath = '../public/'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $publicPath ?>css/style.css">
    <link rel="shortcut icon" href="<?= htmlentities($publicPath) ?>media/logo/logo-mini.svg" type="image/x-icon">
    <title>Ошибка</title>
</head>

<body>
    <!-- header -->
    <header class="header _content">
        <div class="header__content">
            <a class="header__logo" href="/">
                <img src="<?= htmlentities($publicPath) ?>media/logo/logo-mini.svg" alt="logo-mini">
                <p>Xameleyon</p>
            </a>

            <nav class="header__nav">
                <div class="header__nav-close"><span></span></div>
                <a href="/#about">О нас</a>
                <a href="/#cours">Курсы</a>
                <a href="/#teacher">Наставники</a>
                <a href="/#contact">Контакты</a>

                <?php if (isset($_SESSION["user"])) { ?>
                    <a class="_login _btn" href="../../profile/infoUser">В кабинет</a>
                <?php } else { ?>
                    <a class="_login _btn" href="main/login">Войти</a>
                <?php } ?>
            </nav>

            <?php
            if (!isset($_SESSION['selectedLanguage'])) {
                $_SESSION['selectedLanguage'] = 'ru';
            }
            if (isset($_POST['langeRu'])) {
                $_SESSION['selectedLanguage'] = 'ru';
            } elseif (isset($_POST['langeUz'])) {
                $_SESSION['selectedLanguage'] = 'uz';
            }
            ?>

            <div class="header__btns">
                <div class="header__lang" data-langeParent="parent-lang">

                    <div class="header__langContainer">
                        <form id="languageFormRu" method="post">
                            <input type="hidden" name="langeRu">
                        </form>
                        <form id="languageFormUz" method="post">
                            <input type="hidden" name="langeUz">
                        </form>
                    </div>

                    <div id="ytWidget" style="display: none;"></div>
                    <button
                        class="header__lang-p
                            <?php echo htmlentities((isset($_SESSION['selectedLanguage']) && $_SESSION['selectedLanguage'] == 'ru') ? '_active' : ''); ?>"
                        data-lange="lang-ru" data-ya-lang="ru" name="langeRu">ru</button>
                    <button
                        class="header__lang-p
                            <?php echo htmlentities((isset($_SESSION['selectedLanguage']) && $_SESSION['selectedLanguage'] == 'uz') ? '_active' : ''); ?>"
                        data-lange="lang-uz" data-ya-lang="uz" name="langeUz">uz</button>
                </div>

                <div class="header__nav-open"><span></span></div>

                <?php if (isset($_SESSION["user"])) { ?>
                    <a class="_login _btn" href="../../profile/infoUser">В кабинет</a>
                <?php } else { ?>
                    <a class="_login _btn" href="login">Войти</a>
                <?php } ?>
            </div>
        </div>
    </header>

    <div class="error">
        <h3><a href="/">403 <br> Доступ запрещён</a></h3>
    </div>

    <!-- footer -->
    <footer class="footer _content">
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
                <a href="/#about">О нас</a>
                <a href="/#cours">Курсы</a>
                <a href="/#teacher">Наставники</a>
                <a href="/#contact">Контакты</a>
            </div>
            <div class="footer__navigate">
                <p class="footer__name">КОНТАКТЫ</p>
                <a href="tel:+79658426587">+79658426587</a>
                <a href="https://yandex.uz/maps/-/CDRfUB2F">г. Казань, ул Галеева 3</a>
                <div class="footer__media">
                    <img src="<?= htmlentities($publicPath) ?>media/icons/telegram-white.png" alt="telegram-white">
                    <img src="<?= htmlentities($publicPath) ?>media/icons/whatsapp-white.png" alt="whatsapp-white">
                    <img src="<?= htmlentities($publicPath) ?>media/icons/youtube-white.png" alt="youtube-white">
                </div>
            </div>
        </div>
    </footer>
    <script src="<?= htmlentities($publicPath) ?>js/switchMenu.js"></script>
    <script src="<?= htmlentities($publicPath) ?>js/switchLang.js"></script>
    <script src="<?= htmlentities($publicPath) ?>js/yatranslate.js"></script>
</body>

</html>