<?php $publicPath = '../public/'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $publicPath ?>css/style.css">
    <link rel="shortcut icon" href="<?= $publicPath ?>media/logo/logo-mini.svg" type="image/x-icon">
    <title><?= $title ?></title>
</head>

<body>
    <!-- header -->
    <?php if ($headFoot != "profile") { ?>
        <header class="header _content">
            <div class="header__content">
                <a class="header__logo" href="/">
                    <img src="<?= htmlentities($publicPath) ?>media/logo/logo-mini.svg" alt="logo-mini">
                    <p>Xameleyon</p>
                </a>

                <?php if ($headFoot != "lesson") { ?>
                    <nav class="header__nav">
                        <div class="header__nav-close"><span></span></div>
                        <a href="<?= htmlentities($links['about']) ?>">О нас</a>
                        <a href="<?= htmlentities($links['cours']) ?>">Курсы</a>
                        <a href="<?= htmlentities($links['teacher']) ?>">Наставники</a>
                        <a href="<?= htmlentities($links['contact']) ?>">Контакты</a>
                        <a class="_login _btn" href="<?= htmlentities($links['login']) ?>">Войти</a>
                    </nav>
                <?php } ?>

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

                    <?php
                    if ($pannelActive != "lesson") { ?>
                        <div class="header__nav-open"><span></span></div>
                    <?php } ?>

                    <?php if (isset($_SESSION["user"])) { ?>
                        <a class="_login _btn" href="../../profile/infoUser">В кабинет</a>
                    <?php } else { ?>
                        <a class="_btn" href="<?= htmlentities($links['login']) ?>">Войти</a>
                    <?php } ?>
                </div>
            </div>
        </header>
    <?php } ?>