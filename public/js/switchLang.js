//* ---Переключатель языка---
// Получаем кнопки для переключателя
var btnRu = document.querySelector('[data-ya-lang="ru"]');
var btnUz = document.querySelector('[data-ya-lang="uz"]');

// Получаем формы переключателей
var formRu = document.getElementById('languageFormRu');
var formUz = document.getElementById('languageFormUz');

btnUz.addEventListener("click", function () {
    formUz.submit();
    setTimeout(() => {
        if (btnUz.classList.contains("_active")) {
            setTimeout(window.location.reload(), 2000);
        }
    }, 200);
});

btnRu.addEventListener("click", function () {
    formRu.submit();
    setTimeout(() => {
        if (btnRu.classList.contains("_active")) {
            setTimeout(window.location.reload(), 2000);
        }
    }, 200);
});