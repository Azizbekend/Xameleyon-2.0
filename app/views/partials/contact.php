<!-- contact -->
<section class="contact _content _py" id="contact">
    <div class="contact__quetions cq _fonBack-navy__blue">
        <h3 class="_700">Есть вопросы?</h3>
        <p class="cq__text _text-lvl_1">Заполните форму, и мы обязательно Вам ответим</p>
        <form class="contact__form" method="post">
            <input type="text" name="fio" placeholder="Имя">
            <?php if (isset($_SESSION['errors']['fioFeedback'])) {
                echo "<p style='color: red;'>" . htmlentities($_SESSION['errors']["fioFeedback"]) . "</p>";
                unset($_SESSION['errors']['fioFeedback']);
            } ?>
            <input type="tel" name="tel" placeholder="Номер телефона" data-tel-input>
            <?php if (isset($_SESSION['errors']['telFeedback'])) {
                echo "<p style='color: red;'>" . htmlentities($_SESSION['errors']["telFeedback"]) . "</p>";
                unset($_SESSION['errors']['telFeedback']);
            } ?>
            <input type="submit" class="_btn" name="feedback" value="Отправить">
        </form>
        <p class="cq__disclaimer _text-lvl_2">Нажимая кнопку, принимаю <span><a
                    href="<?= htmlentities($publicPath) ?>/documents/oferta.docx" download>условия политики</a></span> и
            <span><a href="<?= htmlentities($publicPath) ?>/documents/oferta.docx" download>пользовательского
                    соглашения</a></span>
        </p>
    </div>
    <div class="contact__info ci _fonBack-navy__blue">
        <div class="ci__word">
            <h3 class="_700">Контакты</h3>
            <p class="ci__text _text-lvl_2"><span>Телефон:</span> +79658426587</p>
            <p class="ci__text _text-lvl_2"><span>Почта:</span> xameleyon@mail.ru</p>
            <p class="ci__text _text-lvl_2"><span>Адрес:</span> Ташкент, уличца Муминова, 4A </p>
            <p class="ci__text _text-lvl_2"><span>Режим работы:</span> 9:00-21:00, ПН-ПТ</p>
        </div>
        <div class="ci__media">
            <img src="<?= htmlentities($publicPath) ?>/media/icons/telegram-color.png" alt="telegram-color">
            <img src="<?= htmlentities($publicPath) ?>/media/icons/whatsapp-color.png" alt="whatsapp-color">
            <img src="<?= htmlentities($publicPath) ?>/media/icons/youtube-color.png" alt="youtube-color">
        </div>
    </div>
    <div class="contact__map">
        <iframe
            src="https://yandex.uz/map-widget/v1/?from=mapframe&ll=69.336871%2C41.343116&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgo0ODc3MTk4MDk2EjBPyrt6YmVraXN0b24sIFRvc2hrZW50LCBNb8q7bWlub3Yga2_Ku2NoYXNpLCA00JAiCg2trIpCFTteJUI%2C&source=mapframe&utm_source=mapframe&z=15.28"
            frameborder="1" allowfullscreen="true">
        </iframe>
    </div>
</section>