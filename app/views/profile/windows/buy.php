<?php
$info = $vars;

function getInp($sName)
{
    if (isset($_SESSION['infoBuy'][$sName])) {
        echo htmlentities($_SESSION['infoBuy'][$sName]);
        unset($_SESSION['infoBuy'][$sName]);
    }
}
function getErrors($sName)
{
    if (isset($_SESSION['errors'][$sName])) {
        echo "<p style='color: red;'>" . htmlentities($_SESSION['errors'][$sName]) . "</p>";
        unset($_SESSION['errors'][$sName]);
    }
}
?>
<form class="buy" method="post">
    <div class="buy__cards">
        <div class="buy__pay buy__card _fonBack-navy__blue">
            <div class="buy__pay-cards">
                <div class="buy__pay-card">
                    <img src="<?= $publicPath ?>media/icons/karta-1.png" alt="karta">
                </div>

                <div class="buy__pay-card">
                    <img src="<?= $publicPath ?>media/icons/karta-2.png" alt="karta">
                </div>

                <div class="buy__pay-card">
                    <img src="<?= $publicPath ?>media/icons/karta-3.png" alt="karta">
                </div>
            </div>

            <div class="buy__inpBlock">
                <p class="_text-lvl_3">Номер карты</p>
                <input class="_text-lvl_3" type="text" name="number" placeholder="1234 1234 1234 1234"
                    id="creditCardInput" value="<?php getInp('number') ?>">
                <?php getErrors('number'); ?>
            </div>

            <div class="buy__inpBlock">
                <p class="_text-lvl_3">ФИ владельца</p>
                <input class="_text-lvl_3" type="text" name="name" placeholder="ИМЯ ФАМИЛИЯ" id="userNameInput"
                    value="<?php getInp('name') ?>">
                <?php getErrors('name'); ?>
            </div>

            <div class="buy__inpBlocks">
                <div class="buy__inpBlock">
                    <p class="_text-lvl_3">Дата</p>
                    <input class="_text-lvl_3" type="text" name="date" id="expirationDateInput" placeholder="__/__"
                        value="<?php getInp('date') ?>">
                    <?php getErrors('date'); ?>
                </div>

                <div class="buy__inpBlock">
                    <p class="_text-lvl_3">CVC</p>
                    <input class="_text-lvl_3" type="number" name="cvc" placeholder="***" id="numberInput"
                        value="<?php getInp('cvc') ?>">
                    <?php getErrors('cvc'); ?>
                </div>
            </div>
        </div>
        <div class="buy__info buy__card _fonBack-navy__blue">
            <div class="buy__info-top">
                <img src="<?= $publicPath ?>media/cours-cards/<?= $info['img'] ?>" alt="course">
                <div class="buy__info-word">
                    <div class="buy__info-text">
                        <p class="_text-lvl_2">Курс</p>
                        <p class="_text-lvl_2"><?= $info['name'] ?></p>
                    </div>
                    <div class="buy__info-text _down">
                        <p class="_text-lvl_1">Стоимость курса</p>
                        <?php if ($info['rate'] == "norm") { ?>
                            <p class="_text-lvl_1"><?= number_format($info['price'], 0, '.', ' ') ?> s’om</p>
                        <?php } else { ?>
                            <p class="_text-lvl_1"><?= number_format($info['price'] / 6, 0, '.', ' ') ?> s’om</p>
                        <?php } ?>
                    </div>
                    <!-- <div class="buy__info-text">
                        <input class="_text-lvl_3" type="text" name="promocode" placeholder="ПРОМОКОД">
                    </div> -->
                </div>
            </div>
            <!-- <div class="buy__info-text _down">
                <p class="_text-lvl_1">Итог</p>
                <p class="_text-lvl_1">100 000 s’om</p>
            </div> -->
        </div>
    </div>

    <div class="buy__btns">
        <input type="hidden" name="idCourse" value="<?= $info['id'] ?>">
        <button class="buy__btn _btn _notBack" name="pay">Купить</button>
        <a class="buy__btn _btn _redBack" href="infoCourse">Назад</a>
    </div>
</form>