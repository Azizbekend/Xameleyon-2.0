//* Переключатель класса _active для языка 
const parentLange = document.querySelectorAll('[data-langeParent="parent-lang"]');


parentLange.forEach(element => {

    const langeBtnRu = element.querySelector('[data-lange="lang-ru"]');
    const langeBtnUz = element.querySelector('[data-lange="lang-uz"]');

    langeBtnRu.addEventListener("click", function () {
        langeBtnRu.classList.add('_active');
        langeBtnUz.classList.remove('_active');
    })

    langeBtnUz.addEventListener("click", function () {
        langeBtnUz.classList.add('_active');
        langeBtnRu.classList.remove('_active');
    })
});

//* Переключатель меню
const openNav = document.querySelector('.header__nav-open');
const closeNav = document.querySelector('.header__nav-close');
const navigation = document.querySelector('.header__nav');

openNav.addEventListener("click", function () {
    navigation.classList.add('_active');
})

closeNav.addEventListener("click", function () {
    navigation.classList.remove('_active');
})