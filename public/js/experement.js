// === Добавление карточек технологий ===
cardSkill = document.getElementById('teh-card');
cloneCardSkill = cardSkill.cloneNode(true);
parentSkill = document.getElementById('parentSkill');
addSkillBtn = document.getElementById('addSkill');

//TODO: Добавлятор - Добаляем новую карту
addSkillBtn.addEventListener("click", function () {
    dataSkill = document.querySelectorAll('[data-skill]');
    if (dataSkill.length < 1) {
        addSkillBtn.insertAdjacentHTML("beforebegin", `<div class="addcours-technologies__card _fonBack-navy__blue" id="teh-card" data-skill> ${cloneCardSkill.innerHTML} </div>`);
        InitDeletSkill();
    }
});

//! Инициализация кнопок карточки
function InitDeletSkill() {
    cardsSkill = document.querySelectorAll("[data-skill]");
    cardsSkill[cardsSkill.length - 1].querySelector("[name='idSkill']").value = generateIdSkills();

    addBtn = cardsSkill[cardsSkill.length - 1].querySelector("[name='technologies__add']");
    removeBtn = cardsSkill[cardsSkill.length - 1].querySelector("[name='technologies__remove']");

    //! Добавление карты
    addBtn.addEventListener("click", function () {
        idSkill = this.closest("[data-skill]").querySelector("[name='idSkill']").value;
        nameSkill = this.closest("[data-skill]").querySelector("[name='nameSkill']").value;
        discriptionSkill = this.closest("[data-skill]").querySelector("[name='discriptionSkill']").value;
        namePost = "addSessionform";

        addSkillAddPost(idSkill, nameSkill, discriptionSkill, namePost);
    })
    //! Удаление ккарты
    removeBtn.addEventListener("click", function () {
        this.closest("[data-skill]").remove();
    })
}
InitDeletSkill();


//* Добавление - кнопка для добавления данных 
function addSkillAddPost(idSkill, nameSkill, discriptionSkill, namePost) {
    // Отправляем данные на сервер методом POST
    fetch('', { // Пустой URL, т.к. запрос отправляется на тот же файл
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ idSkill: idSkill, nameSkill: nameSkill, discriptionSkill: discriptionSkill, namePost: namePost })
    })
        .then(response => response.json())

        //! нужно вообще через js выводить данные?
        .then(data => {
            console.log(data);
            //*Отображение данных 
        })
        .catch(error => {
            //*Отображение ошибок
            outputRrrors(error);
        });
}
//*Отображение данных - недоделанно 
// function outputSkills() {
//     // Отображаем данные под формой
//     const responseContainer = document.getElementById('responseContainer');
//     if (data.status === 'success') {
//         responseContainer.innerHTML = `<p><strong>Message:</strong> ${data.message}</p>
//                                                 <p><strong>Input 1:</strong> ${data.input1}</p>
//                                                 <p><strong>Input 2:</strong> ${data.input2}</p>`;
//     }
// }
//*Отображение ошибок
function outputRrrors(error) {
    console.error('Error:', error);
    document.getElementById('parentSkill').innerHTML = `<p><strong>Error:</strong> ${error.message}</p>`;
}




//TODO: Генерируем новый id для новых карточек
function generateIdSkills() {
    countSkill = document.querySelectorAll('.addcours-technologies__card');
    count = 0;

    if (countSkill.length > 2) {
        count = countSkill[countSkill.length - 3].querySelector('input[name="idSkill"]').value;
        return ++count;
    } else {
        return 1;
    }
}