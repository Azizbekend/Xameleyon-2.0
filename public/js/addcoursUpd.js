// === Добавление карточек технологий ===
cardSkill = document.getElementById('teh-card');
cloneCardSkill = cardSkill.cloneNode(true);
parentSkill = document.getElementById('parentSkill');
addSkillBtn = document.getElementById('addSkill');

// Добавлятор - Добаляем новую карту
addSkillBtn.addEventListener("click", function () {
    dataSkill = document.querySelectorAll('[data-skill]');
    if (dataSkill.length < 1) {
        addSkillBtn.insertAdjacentHTML("beforebegin", `<div class="addcours-technologies__card _fonBack-navy__blue" id="teh-card" data-skill> ${cloneCardSkill.innerHTML} </div>`);
        InitDeletSkill();
    }
});

// Инициализация кнопок карточки
function InitDeletSkill() {
    cardsSkill = document.querySelectorAll("[data-skill]");
    cardsSkill[cardsSkill.length - 1].querySelector("[name='idSkill']").value = generateIdSkills();

    addBtn = cardsSkill[cardsSkill.length - 1].querySelector("[name='technologies__add']");
    removeBtn = cardsSkill[cardsSkill.length - 1].querySelector("[name='technologies__remove']");

    // Добавление карты
    addBtn.addEventListener("click", function () {
        idSkill = this.closest("[data-skill]").querySelector("[name='idSkill']").value;
        nameSkill = this.closest("[data-skill]").querySelector("[name='nameSkill']").value;
        discriptionSkill = this.closest("[data-skill]").querySelector("[name='discriptionSkill']").value;
        processForm(idSkill, nameSkill, discriptionSkill, addPost);
    })
    // Удаление ккарты
    removeBtn.addEventListener("click", function () {
        this.closest("[data-skill]").remove();
    })
}
InitDeletSkill();

// Карты, которые уже имеются
getCardsSkill = document.querySelectorAll("[data-getSkillPost]");
getCardsSkill.forEach(element => {
    updateSkillSes = element.querySelector("[name='updateSkill']");
    removeSkillSes = element.querySelector("[name='removeSkill']");

    // Обновление данных
    updateSkillSes.addEventListener("click", function () {
        idSkill = this.closest("[data-getSkillPost]").querySelector("[name='idSkill']").value;
        nameSkill = this.closest("[data-getSkillPost]").querySelector("[name='nameSkill']").value;
        discriptionSkill = this.closest("[data-getSkillPost]").querySelector("[name='discriptionSkill']").value;
        processForm(idSkill, nameSkill, discriptionSkill, updatePost);
    })
    // Удаление карты
    removeSkillSes.addEventListener("click", function () {
        idSkill = this.closest("[data-getSkillPost]").querySelector("[name='idSkill']").value;
        processDelteForm(idSkill, deletePost);
    })
});

// === Работа с формами технологий ===
addPost = document.querySelector('form[name="addPostform"]');
updatePost = document.querySelector('form[name="updatePostform"]');
deletePost = document.querySelector('form[name="deletePostform"]');

// Добавления, редактирования
function processForm(idSkillOld, nameSkillOld, discriptionSkillOld, func) {
    func.querySelector('input[name="idSkill"]').value = idSkillOld;
    func.querySelector('input[name="nameSkill"]').value = nameSkillOld;
    func.querySelector('input[name="discriptionSkill"]').value = discriptionSkillOld;

    switch (func.name) {
        case 'addPostform':
            addPost.querySelector('button').click();
            break;
        case 'updatePostform':
            updatePost.querySelector('button').click();
            break;
    }
}

// Уддаления
function processDelteForm(idSkillOld, func) {
    func.querySelector('input[name="idSkill"]').value = idSkillOld;
    deletePost.querySelector('button').click();
}

// Генерируем новый id для новых карточек
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