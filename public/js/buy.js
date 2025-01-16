// ---Поле номера карты---
// Получаем ссылку на поле ввода
const creditCardInput = document.getElementById('creditCardInput');

// Функция для форматирования номера карты
function formatCreditCardNumber(input) {
    // Убираем все символы, кроме цифр
    let value = input.value.replace(/\D/g, '');
    // Ограничиваем количество символов до 16
    value = value.substring(0, 16);
    // Разбиваем номер карты на блоки по 4 цифры и добавляем пробелы между ними
    const formattedValue = value.replace(/(\d{4})/g, '$1 ').trim();
    // Обновляем значение поля ввода
    input.value = formattedValue;
}

// Назначаем обработчик события input для поля ввода
creditCardInput.addEventListener('input', function () {
    formatCreditCardNumber(this);
});

// ---Поле имени карты---
// Получаем ссылку на поле ввода имени пользователя
const userNameInput = document.getElementById('userNameInput');

// Функция для форматирования имени пользователя
function formatUserName(input) {
    // Получаем значение поля ввода
    let value = input.value;
    // Оставляем только латинские буквы и пробелы
    value = value.replace(/[^a-zA-Z\s]/g, '');
    // Преобразуем все буквы в верхний регистр
    value = value.toUpperCase();
    // Обновляем значение поля ввода
    input.value = value;
}

// Назначаем обработчик события input для поля ввода имени пользователя
userNameInput.addEventListener('input', function () {
    formatUserName(this);
});

// --- Поле ввода даты ---
const expirationDateInput = document.getElementById('expirationDateInput');

// Функция для форматирования срока годности карты
function formatExpirationDate(input) {
    // Получаем значение поля ввода
    let value = input.value;
    // Убираем все символы, кроме цифр
    value = value.replace(/\D/g, '');
    // Получаем позицию курсора
    const cursorPosition = input.selectionStart;
    // Форматируем значение поля ввода
    if (value.length === 3) {
        input.value = value.substring(0, 2) + '/' + value.charAt(2);
    }
    // Ограничиваем количество символов до 5
    input.value = input.value.substring(0, 5);
}
// Назначаем обработчик события input для поля ввода срока годности карты
expirationDateInput.addEventListener('input', function () {
    formatExpirationDate(this);
});


// --- Поле ввода CVC ---
// Получаем ссылку на поле ввода
const numberInput = document.getElementById('numberInput');

// Добавляем обработчик события input для поля ввода
numberInput.addEventListener('input', function () {
    // Убираем все символы, кроме цифр
    let value = this.value.replace(/\D/g, '');

    // Ограничиваем значение до трех цифр
    if (value.length > 3) {
        value = value.slice(0, 3);
    }

    // Обновляем значение поля ввода
    this.value = value;
});