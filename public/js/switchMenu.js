//* ---Переключатель меню---
const openNav = document.querySelector('.header__nav-open');
const closeNav = document.querySelector('.header__nav-close');
const navigation = document.querySelector('.header__nav');

openNav.addEventListener("click", function () {
    navigation.classList.add('_active');
})

closeNav.addEventListener("click", function () {
    navigation.classList.remove('_active');
})
