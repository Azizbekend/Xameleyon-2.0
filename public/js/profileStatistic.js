//* ---Переключатель статистики---
statisticTabs = document.querySelectorAll('.statistics__tab');
statisticTablet = document.querySelectorAll('.statistics__tablet');

for (let i = 0; i < 3; i++) {
    statisticTabs[i].addEventListener('click', function () {
        statisticTabs.forEach(element => {
            element.classList.remove('_active');
        });

        statisticTablet.forEach(element => {
            element.classList.remove('_active');
        });

        statisticTabs[i].classList.add('_active');
        statisticTablet[i].classList.add('_active');
    })
}


//* ---Делаем рабочей аккардеон---
accordionCard = document.querySelectorAll('._accordionCard');

accordionCard.forEach(element => {

    let accordionDown = element.querySelector('._accordionDown');
    let accordionBottom = element.querySelector('._accordionBottom');

    if (accordionDown != null) {

        accordionDown.addEventListener("click", function () {
            if (accordionDown.classList.contains("_active")) {
                accordionDown.classList.remove("_active");
                accordionDown.style.rotate = "180deg"

                accordionBottom.style.height = "0%";
                accordionBottom.style.opacity = "0";
                setTimeout(() => {
                    accordionBottom.style.display = "none";
                }, 100);
            } else {
                accordionDown.classList.add("_active");
                accordionDown.style.rotate = "0deg"

                accordionBottom.style.display = "flex";
                setTimeout(() => {
                    accordionBottom.style.height = "100%";
                    accordionBottom.style.opacity = "1";
                }, 100);
            }
        })
    }
});