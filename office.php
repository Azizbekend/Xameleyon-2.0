<div class="office _py">
    
    <div class="office__panel op _fonBack-navy__blue">
        <div class="office__panel-content">
            <h3 class="_700">Админ панель</h3>
            <div class="office__panel-user _user">
                <img src="assets/media/users/teacher-1.jpg" alt="user">
                <p class="_text-lvl_2 _700">Azimjon Po'latov</p>
            </div>

            <div class="office__panel-balance">
                <div class="office__panel-balance__top _balance">
                    <p>Баланс</p>
                    <p>800.000 so`m</p>
                </div>
                
                <button class="office__panel-balance__btn _btn _border _unbounded">Пополнить</button>
            </div>
            
            <a class="office__panel-tab _active" href="?page=office&tab=info"><span>Личная информация</span><div class="office__panel-tab__img"><img src="assets/media/icons/user.svg" alt="user"></div></a>
            <a class="office__panel-tab _tab" href="?page=office&tab=group"><span>Группы</span><div class="office__panel-tab__img"><img src="assets/media/icons/people.svg" alt="user"></div></a>
            <!-- <a class="office__panel-tab _tab" href="?page=office&tab=catalog"><span>Курсы</span><div class="office__panel-tab__img"><img src="assets/media/icons/teacher.svg" alt="user"></div></a> -->
            <!-- <a class="office__panel-tab _tab" href="?page=office&tab=statistics"><span>Статистика</span><div class="office__panel-tab__img"><img src="assets/media/icons/diagram.svg" alt="user"></div></a> -->
            <a class="office__panel-tab _tab" href="?page=office&tab=curs"><span>Добавить курс</span><div class="office__panel-tab__img"><img src="assets/media/icons/add-curs.svg" alt="user"></div></a>
            <a class="office__panel-tab _tab _logout" href="?page=welcome"><span>Выйти</span> <div class="office__panel-tab__img"><img src="assets/media/icons/logout.svg" alt="logout"></div></a>
        </div>
    </div>

    <div class="office__windows">
    <div class="office__windows-top _fonBack-navy__blue">
        <div class="office__windows-top__left">

            <div class="office__windows-user _user">
                <img src="assets/media/users/teacher-1.jpg" alt="user">
                <p class="_text-lvl_2 _700">Azimjon Po'latov</p>
            </div>

            <p class="office__windows-balance _balance">800.000 so`m</p>
        </div>
        
        <a class="office__panel-tab _tab" href="?page=welcome"><span>Выйти</span> <div class="office__panel-tab__img"><img src="assets/media/icons/logout.svg" alt="logout"></div></a>
    </div>
        <?php include "windows/catalog.php"; ?>
    </div>
</div>